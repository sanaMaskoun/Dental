<?php
namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Http\Requests\DoctorEditProfileRequest;
use App\Http\Requests\DoctorEditRequest;
use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function dashboard()
    {
        $num_patients        = User::where('type', UserTypeEnum::patient)->where('is_active', true)->count();
        $num_specializations = Specialization::count();
        $num_services        = Service::count();
        $allMonths = collect(range(1, 12))->mapWithKeys(function ($month) {
            return [$month => 0];
        });
        return view('dashboard.pages.doctor.dashboard');

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

        return redirect()->route('doctor_list')->with('success', 'Modified successfully');
    }


    public function editProfile(User $doctor)
    {

            $services         = Service::all();
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



        if (!is_null(request()->file('profile'))) {
            $user->clearMediaCollection('profile');
            $user->addMedia($request->file('profile'))->toMediaCollection('profile');
        }

            return redirect()->route('doctor_details', Auth()->user()->id)
                ->with('success', 'Modified successfully');

    }

    protected function assignSpecialtiesToDoctor(Doctor $doctor)
{
    $specializations = $doctor->services->pluck('specialization_id')->unique();

    $doctor->specializations()->sync($specializations);
}

}
