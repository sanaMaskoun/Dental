<?php
namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Http\Requests\DiagnoseRequest;
use App\Models\Diagnos;
use App\Models\Patient;
use App\Models\User;

class DiagnosController extends Controller
{
    public function index()
    {
        if (Auth()->user()->type == UserTypeEnum::admin) {
            $diagnosis = Diagnos::all();
        } else {
            $diagnosis = Diagnos::where('doctor_id', Auth()->user()->doctor->id)->get();
        }

        return view('dashboard.pages.diagnos.list', compact('diagnosis'));
    }

    public function show(Diagnos $diagnose)
    {
        return view('dashboard.pages.diagnos.show', compact('diagnose'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('dashboard.pages.diagnos.create' , compact('patients'));
    }

    public function store(DiagnoseRequest $request)
    {
        $diagnose = Diagnos::create($request->validated());
        if (! is_null(request()->file('diagnosImg'))) {
            $diagnose->addMedia(request()->file('diagnosImg'))->toMediaCollection('diagnosImg');
        }
        return redirect()->route('diagnose_list')
        ->with('success', trans('message.add'));

    }

    public function edit(Diagnos $diagnose)
    {
        $patients = Patient::all();

        return view('dashboard.pages.diagnos.edit',compact('diagnose','patients'));
    }


    public function update(DiagnoseRequest $request, Diagnos $diagnose)
    {

        $diagnose->update($request->validated());

        return redirect()->route('diagnose_list')
        ->with('success', trans('message.update'));

    }


 public function destroy(Diagnos $diagnose)
    {

        $diagnose->delete();

        return redirect()->route('diagnose_list')
            ->with('success', trans('message.delete'));

    }
}
