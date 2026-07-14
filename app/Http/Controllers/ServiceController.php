<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Services\ServiceService;

class ServiceController extends Controller
{
    protected ServiceService $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function services()
    {
        $settings = Setting::first();
        $services  = Service::all();

        return view('services',compact('settings', 'services'));
    }

    public function store(Request $request)
    {
        // Validate image size and type
        $request->validate([
            'services.*.image' => 'nullable|image|max:1024', // 1MB = 1024KB
            'new_service_images.*' => 'nullable|image|max:1024',
        ]);

        $this->serviceService->validate($request);
        $this->serviceService->handleExistingServices($request);
        $this->serviceService->handleNewServices($request);

        return redirect()->back()->with('success', 'Services saved successfully.');
    }

    public function destroy(Service $service)
    {
        $this->serviceService->deleteService($service);
        return redirect()->back()->with('success', 'Service deleted successfully.');
    }
}