<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {

        $services = Service::get();
        return view('dashboard.pages.service.list', compact('services'));
    }

    public function create()
    {
        $specializations = Specialization::get();
        return view('dashboard.pages.service.create', compact('specializations'));
    }
    public function store(ServiceRequest $request)
    {

        $service = Service::create($request->validated());
        $service->addMedia(request()->file('img'))->toMediaCollection('img');

        return redirect()->route('services_list')
            ->with('success', trans('message.add'));

    }

    public function edit(Service $service)
    {
        $specializations = Specialization::get();

        return view('dashboard.pages.service.edit', compact('service','specializations'));
    }

    public function update(ServiceRequest $request, Service $service)
    {

        $service->update($request->validated());

        $hasImage = $service->getFirstMediaUrl('img') ? true : false;

        $request->merge(['has_image' => $hasImage]);

        if (! is_null(request()->file('img'))) {
            $service->addMedia(request()->file('img'))->toMediaCollection('img');
        }
        return redirect()->route('services_list')
            ->with('success', trans('message.update'));

    }
    public function destroy(Service $service)
    {

        $service->delete();

        return redirect()->route('services_list')
            ->with('success', trans('message.delete'));

    }
}
