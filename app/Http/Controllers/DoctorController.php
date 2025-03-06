<?php
namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function dashboard()
    {}


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
            ->with('success', 'Added successfully');

    }

    public function show(User $doctor)
    {

         return view('dashboard.pages.doctor.show', compact('doctor'));
    }
    public function edit(User $doctor)
    {
         if ($doctor->is_active == 0) {
            return redirect()->route('doctor_list')->with('error', 'The account you want to modify is inactive');
        }
        else
        return view('dashboard.pages.doctor.edit', compact('doctor'));

    }

    public function update(DoctorRequest $request, User $doctor)
    {


          $user =  $doctor->update($request->userValidated());
         $edit_doctor =   $doctor->doctor()->update($request->doctorValidated());
            if (! is_null(request()->file('profile'))) {
                // $doctor->doctor()->clearMediaCollection('doctorImg');
                $doctor->addMedia($request->file('profile'))->toMediaCollection('profile');
            }
            return redirect()->route('doctor_list')
                ->with('success', 'Modified successfully');

    }

    public function editProfile(User $doctor)
    {
        // if (Auth()->user()->is_active == 0) {
        //     return redirect()->route('coachDetails', Auth()->user()->id)->with('error', 'This account is inactive');
        // } else {
        //     $specialties         = Specialty::all();
        //     $selectedSpecialties = $coach->coach?->specialties->pluck('id')->toArray();

        //     return view('coach.editProfile', compact(['coach', 'specialties', 'selectedSpecialties']));
        // }
    }

    public function updateProfile(DoctorRequest $request, User $user)
    {
        // if ($user->is_active == 0) {
        //     return redirect()->route('coachesList')->with('error', 'The account you want to modify is inactive');
        // } else {

        //     $user->update($request->userValidated());

        //     $coach = $user->coach()->updateOrCreate([], $request->coachValidated());

        //     $coach->specialties()->sync($request->specialties);
        //     if (! is_null(request()->file('profile'))) {
        //         $user->clearMediaCollection('profile');
        //         $user->addMedia($request->file('profile'))->toMediaCollection('profile');
        //     }
        //     return redirect()->route('coachDetails', Auth()->user()->id)
        //         ->with('success', 'Modified successfully');
        // }
    }

    public function availability(Request $request)
    {
        // Appointment::create([
        //     'availability_date' => $request->date,
        //     'availability_time' => $request->time,
        //     'coach_id'          => Auth()->user()->coach->id,
        // ]);
        // return redirect()->route('coachDetails', Auth()->user()->id)
        //     ->with('success', 'add successfully');

    }
}
