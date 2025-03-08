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

        Service::create($request->validated());

        return redirect()->route('service_list')
            ->with('success', 'Added successfully');

    }

    public function edit(Service $service)
    {
        $specializations = Specialization::get();

        return view('dashboard.pages.service.edit', compact('service','specializations'));
    }

    public function update(ServiceRequest $request, Service $service)
    {

        $service->update($request->validated());

        return redirect()->route('service_list')
            ->with('success', 'Modified successfully');

    }
    public function destroy(Service $service)
    {

        $service->delete();

        return redirect()->route('service_list')
            ->with('success', 'delete successfully');

    }
}
