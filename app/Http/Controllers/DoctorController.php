<?php
namespace App\Http\Controllers;

use App\Enums\StatusBookingEnum;
use App\Enums\UserTypeEnum;
use App\Http\Requests\DoctorEditProfileRequest;
use App\Http\Requests\DoctorEditRequest;
use App\Http\Requests\DoctorRequest;
use App\Models\Booking;
use App\Models\Diagnos;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function dashboard()
    {
        $doctor = Auth()->user()->doctor;

        $num_patients = Diagnos::where('doctor_id', $doctor->id)
                        ->distinct('patient_id')
                        ->count('patient_id');

        $num_specializations = Specialization::whereHas('doctors', function ($query) use ($doctor) {
            $query->where('doctors.id', $doctor->id);
        })->count();

        $num_services = Service::whereHas('doctors', function ($query) use ($doctor) {
            $query->where('doctors.id', $doctor->id);
        })->count();

        $patients_per_month = Diagnos::where('doctor_id', $doctor->id)
            ->selectRaw('MONTH(created_at) as month, COUNT(DISTINCT patient_id) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $all_months = collect(range(1, 12))->mapWithKeys(function ($month) {
            return [$month => 0];
        });

        $patients_data = array_replace($all_months->toArray(), $patients_per_month);
        ksort($patients_data);


        $months = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug',
            9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
        ];

        $bookings = Booking::with('service')
        ->where('doctor_id', $doctor->id)
        ->where('status', StatusBookingEnum::complete)
        ->get();

    $total_revenue = $bookings->sum(function ($booking) {
        return $booking->service->price;
    });

    $doctor_earnings = $total_revenue * 0.95;


        return view('dashboard.pages.doctor.dashboard', compact(
            'num_patients',
            'num_services',
            'num_specializations',
            'patients_data',
            'months',
            'doctor_earnings'
        ));
    }

    public function index(Request $request)
    {
        $doctors = User::where('type', UserTypeEnum::doctor)->get();
        return view('dashboard.pages.doctor.list', compact('doctors'));
    }
    public function create()
    {
        return view('dashboard.pages.doctor.create');
    }
    public function store(DoctorRequest $request)
    {
        $user = User::create($request->userValidated());

        $doctor = $user->doctor()->create($request->doctorValidated());

        if (! is_null(request()->file('profile'))) {
            $user->addMedia(request()->file('profile'))->toMediaCollection('profile');
        }
        $user->assignRole('doctor');

        return redirect()->route('doctor_list')
            ->with('success', trans('message.add'));

    }

    public function show(User $doctor)
    {

        return view('dashboard.pages.doctor.show', compact('doctor'));
    }
    public function edit(User $doctor)
    {
        if ($doctor->is_active == 0) {
            return redirect()->route('doctor_list')->with('error', trans('message.inactive_account'));
        } else {
            return view('dashboard.pages.doctor.edit', compact('doctor'));
        }

    }

    public function update(DoctorEditRequest $request, User $doctor)
    {
        $doctor->update($request->userValidated());

        if ($doctor->doctor) {
            $doctor->doctor->update($request->doctorValidated());
        }

        if ($request->hasFile('profile')) {
            $doctor->clearMediaCollection('profile');
            $doctor->addMedia($request->file('profile'))->toMediaCollection('profile');
        }

        return redirect()->route('doctor_list')->with('success', trans('message.update'));
    }

    public function editProfile(User $doctor)
    {

        $services          = Service::all();
        $selected_services = $doctor->doctor?->services->pluck('id')->toArray();

        return view('dashboard.pages.doctor.editProfile', compact(['doctor', 'services', 'selected_services']));

    }

    public function updateProfile(DoctorEditProfileRequest $request, User $user)
    {

        $user->update($request->userValidated());
        $user->doctor()->update($request->doctorValidated());
        $doctor = $user->doctor;

        $doctor->services()->sync($request->services);

        $this->assignSpecialtiesToDoctor($doctor);

        if (! is_null(request()->file('profile'))) {
            $user->clearMediaCollection('profile');
            $user->addMedia($request->file('profile'))->toMediaCollection('profile');
        }

        return redirect()->route('doctor_details', Auth()->user()->id)
            ->with('success', trans('message.update'));

    }

    protected function assignSpecialtiesToDoctor(Doctor $doctor)
    {
        $specializations = $doctor->services->pluck('specialization_id')->unique();

        $doctor->specializations()->sync($specializations);
    }

}
