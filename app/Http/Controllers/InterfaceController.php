<?php
namespace App\Http\Controllers;

use App\Enums\PaymentMethodEnum;
use App\Enums\StatusBookingEnum;
use App\Enums\UserTypeEnum;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\JoinRequest;
use App\Http\Requests\RechargeStoreRequest;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\ContactUs;
use App\Models\Credit;
use App\Models\Doctor;
use App\Models\FAQ;
use App\Models\JoinUs;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InterfaceController extends Controller
{
    public function home()
    {
        $specializations = Specialization::all();
        $services        = Service::all();

        return view('interface.pages.home', compact('specializations', 'services'));
    }
    public function about()
    {
        return view('interface.pages.about');
    }
    public function service()
    {
        $services = Service::all();
        return view('interface.pages.service', compact('services'));
    }
    public function doctor()
    {
        $doctors = User::where('type', UserTypeEnum::doctor)->where('is_active', true)->get();
        return view('interface.pages.doctor', compact('doctors'));
    }
    public function faq()
    {
        $faqs = FAQ::all();
        return view('interface.pages.faq', compact('faqs'));
    }
    public function contact()
    {
        return view('interface.pages.contact');
    }

    public function contactStore(ContactRequest $request)
    {

        ContactUs::create($request->validated());
        return redirect()->back();
    }
    public function join()
    {
        return view('interface.pages.join');
    }

    public function joinStore(JoinRequest $request)
    {

        JoinUs::create($request->validated());
        return redirect()->back();
    }

    public function recharge()
    {
        return view('interface.pages.recharge');
    }

    public function rechargeStore(RechargeStoreRequest $request)
    {

        $credit = Credit::create($request->validated());
        $credit->addMedia(request()->file('link'))->toMediaCollection('link');

        return redirect()->back()
            ->with('success', trans('message.recharge_successfully'));

    }

    public function specializationDetails(Specialization $specialization)
    {
        return view('interface.pages.specializationDetails', compact('specialization'));
    }
    public function serviceDetails(Service $service)
    {
        return view('interface.pages.serviceDetails', compact('service'));
    }
    public function doctorView(User $doctor)
    {
        return view('interface.pages.DoctorView', compact('doctor'));
    }

    public function getDoctors($serviceId)
    {
        $doctors = User::where('type', UserTypeEnum::doctor)
            ->whereHas('doctor.services', function ($query) use ($serviceId) {
                $query->where('services.id', $serviceId);
            })
            ->get();

            $options = '<option value="">' . __('pages.choose_doctor') . '</option>';
            foreach ($doctors as $doctor) {
            $options .= '<option value="' . $doctor->id . '">' . $doctor->first_name . ' ' . $doctor->last_name . '</option>';
        }

        return $options;
    }

    public function getAppointments(User $user)
    {


        $doctor = $user->doctor;

        $appointments = Appointment::where('doctor_id', $doctor->id)
            ->where('is_available', 1)
            ->orderBy('date', 'asc')
            ->orderBy('start_time', 'asc')
            ->get();

        $slotDuration = 60;
        $options = '<option value="">' . __('pages.choose_time') . '</option>';

        foreach ($appointments as $appointment) {
            $startTime = strtotime($appointment->start_time);
            $endTime   = strtotime($appointment->end_time);

            while ($startTime + ($slotDuration * 60) <= $endTime) {
                $formattedStart = date('H:i:s', $startTime);
                $formattedEnd   = date('H:i', $startTime + ($slotDuration * 60));

                $options .= '<option value="' . $formattedStart . '">' .
                $appointment->date . ' | ' . date('H:i', $startTime) . ' - ' . $formattedEnd .
                    '</option>';

                $startTime += $slotDuration * 60;
            }
        }

        return $options;
    }

    public function bookAppointment(Request $request)
    {
        $doctor = Doctor::where('user_id', $request->doctor)->firstOrFail();
        $service = Service::findOrFail($request->service);
        $patient = Auth()->user()->patient;

        $existing_booking = Booking::where('patient_id', $patient->id)
            ->where('service_id', $service->id)
            ->where('doctor_id', $doctor->id)
            ->where('status', StatusBookingEnum::pending)
            ->first();

        if ($request->payment_method == PaymentMethodEnum::full) {
            if ($existing_booking) {
                Booking::create([
                    'doctor_id' => $doctor->id,
                    'patient_id' => $patient->id,
                    'service_id' => $request->service,
                    'start_time' => $request->appointment,
                    'end_time' => Carbon::parse($request->appointment)->addHours(1),
                    'payment_method' => $request->payment_method,
                    'status' => StatusBookingEnum::pending,
                ]);

                return redirect()->back()->with('success', trans('message.booking_create'));
            } else {
                if ($patient->account < $service->price) {
                    return redirect()->back()->with('error', trans('message.no_enough_balance'));
                }

                $amount = $patient->account - $service->price;
                $patient->update(['account' => $amount]);

                Booking::create([
                    'doctor_id' => $doctor->id,
                    'patient_id' => $patient->id,
                    'service_id' => $request->service,
                    'start_time' => $request->appointment,
                    'end_time' => Carbon::parse($request->appointment)->addHours(1),
                    'payment_method' => $request->payment_method,
                    'status' => StatusBookingEnum::pending,
                ]);
            }
        }
        elseif ($request->payment_method == PaymentMethodEnum::installment) {
            $previous_bookings = Booking::where('patient_id', $patient->id)
                ->where('service_id', $service->id)
                ->where('doctor_id', $doctor->id)

                ->where('payment_method', PaymentMethodEnum::installment)
                ->get();

            $total_paid = 0;

            foreach ($previous_bookings as $booking) {
                $total_paid += Payment::where('booking_id', $booking->id)->sum('amount');
            }

            $remaining = $service->price - $total_paid;

            if ($remaining <= 0) {
                Booking::create([
                    'doctor_id' => $doctor->id,
                    'patient_id' => $patient->id,
                    'service_id' => $request->service,
                    'start_time' => $request->appointment,
                    'end_time' => Carbon::parse($request->appointment)->addHours(1),
                    'payment_method' => $request->payment_method,
                    'status' => StatusBookingEnum::pending,
                ]);

                return redirect()->back()->with('success', trans('message.paid_all_balance'));
            }

            $payment_amount = ($total_paid == 0) ? ($service->price / 2) : min($remaining, $service->price / 2);

            if ($patient->account < $payment_amount) {
                return redirect()->back()->with('error', trans('message.no_enough_balance'));
            }

            $amount = $patient->account - $payment_amount;
            $patient->update(['account' => $amount]);

            $new_booking = Booking::create([
                'doctor_id' => $doctor->id,
                'patient_id' => $patient->id,
                'service_id' => $request->service,
                'start_time' => $request->appointment,
                'end_time' => Carbon::parse($request->appointment)->addHours(1),
                'payment_method' => $request->payment_method,
                'status' => StatusBookingEnum::pending,
            ]);

            Payment::create([
                'booking_id' => $new_booking->id,
                'amount' => $payment_amount,
            ]);
        }

        $this->updateDoctorAvailability($doctor, $request->appointment, Carbon::parse($request->appointment)->addHours(1));

        return redirect()->back()->with('success', trans('message.booking_successfully'));
    }
    public function updateDoctorAvailability($doctor, $startTime, $endTime)
    {

        $startTime = Carbon::parse($startTime);
        $endTime   = Carbon::parse($endTime);

        $appointment = Appointment::where('doctor_id', $doctor->id)
            ->where('start_time', '<=', $startTime->format('H:i:s'))
            ->where('end_time', '>=', $endTime->format('H:i:s'))
            ->where('is_available', true)
            ->first();

        if (! $appointment) {
            return;
        }

        if ($appointment->start_time < $startTime) {
            Appointment::create([
                'doctor_id'    => $doctor->id,
                'date'         => $appointment->date,
                'start_time'   => $appointment->start_time,
                'end_time'     => $startTime,
                'is_available' => true,
            ]);
        }
        if ($appointment->end_time > $endTime) {
            Appointment::create([
                'doctor_id'    => $doctor->id,
                'date'         => $appointment->date,
                'start_time'   => $endTime,
                'end_time'     => $appointment->end_time,
                'is_available' => true,
            ]);
        }

        Appointment::create([
            'doctor_id'    => $doctor->id,
            'date'         => $appointment->date,
            'start_time'   => $startTime,
            'end_time'     => $endTime,
            'is_available' => false,
        ]);

        $appointment->delete();

    }

}
