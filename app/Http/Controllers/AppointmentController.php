<?php
namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function index()
    {

        return view('dashboard.pages.appointment.list');
    }

    public function getAppointments()
    {
        $appointments = Appointment::where('doctor_id',Auth()->user()->id)->get()->map(function ($appointment) {
            return [
                'id'     => $appointment->id,
                'start'  => $appointment->date . 'T' . $appointment->start_time,
                'end'    => $appointment->date . 'T' . $appointment->end_time,
                'allDay' => false,
            ];
        });
        return response()->json($appointments);
    }
    public function create()
    {
        return view('dashboard.pages.appointment.create');
    }

    public function store(AppointmentRequest $request)
    {

        $formattedDate = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');

        $conflict = Appointment::where('date', $formattedDate)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('start_time', '<', $request->start_time)
                            ->where('end_time', '>', $request->end_time);
                    });
            })
            ->exists();

        if ($conflict) {
            return redirect()->route('appointment_list')
                ->with('error', 'There is a scheduling conflict. Please select last.');
        } else {
            Appointment::create($request->validated());

            return redirect()->route('appointment_list')
                ->with('success', 'Added successfully');
        }
    }


    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $formattedDate = Carbon::parse($request->date)->format('Y-m-d');

        $conflict = Appointment::where('date', $formattedDate)
            ->where('id', '!=', $appointment->id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('start_time', '<', $request->start_time)
                          ->where('end_time', '>', $request->end_time);
                    });
            })
            ->exists();

        if ($conflict) {
            return response()->json([
                'status' => 'error',
                'message' => 'There is a scheduling conflict. Please select another time.'
            ], 422);
        }

        $appointment->update([
            'date' => $formattedDate,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Event updated successfully',
            'appointment' => $appointment
        ]);
    }


    public function destroy(Appointment $appointment)
    {


        $appointment->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Appointment deleted successfully.'
        ]);
    }

}
