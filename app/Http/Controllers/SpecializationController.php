<?php
namespace App\Http\Controllers;

use App\Http\Requests\SpecializationRequest;
use App\Models\Specialization;

class SpecializationController extends Controller
{

    public function index()
    {

        $specializations = Specialization::get();
        return view('dashboard.pages.specialization.list', compact('specializations'));
    }

    public function create()
    {
        return view('dashboard.pages.specialization.create');
    }
    public function store(SpecializationRequest $request)
    {

       $specialization = Specialization::create($request->validated());
        $specialization->addMedia(request()->file('img'))->toMediaCollection('img');

        return redirect()->route('specialization_list')
            ->with('success', 'Added successfully');

    }

    public function edit(Specialization $specialization)
    {

        return view('dashboard.pages.specialization.edit', compact('specialization'));
    }

    public function update(SpecializationRequest $request, Specialization $specialization)
    {

        $specialization->update($request->validated());
        $hasImage = $specialization->getFirstMediaUrl('img') ? true : false;

        $request->merge(['has_image' => $hasImage]);

        if (! is_null(request()->file('img'))) {
            $specialization->addMedia(request()->file('img'))->toMediaCollection('img');
        }
        return redirect()->route('specialization_list')
            ->with('success', 'Modified successfully');

    }
    public function destroy(Specialization $specialization)
    {

        $specialization->delete();

        return redirect()->route('specialization_list')
            ->with('success', 'delete successfully');

    }
}
