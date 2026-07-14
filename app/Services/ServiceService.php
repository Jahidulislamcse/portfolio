<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceService
{
    public function validate(Request $request)
    {
        $request->validate([
            'services.*.image' => 'nullable|image|max:2048',
            'services.*.heading' => 'nullable|string|max:255',
            'services.*.desc' => 'nullable|string',
            'new_services.*.image' => 'nullable|image|max:2048',
            'new_services.*.heading' => 'nullable|string|max:255',
            'new_services.*.desc' => 'nullable|string',
        ]);
    }

    public function handleExistingServices(Request $request)
    {
        if (!$request->has('services')) return;

        foreach ($request->services as $id => $data) {
            $service = Service::find($id);
            if (!$service) continue;

            if (isset($data['delete']) && $data['delete']) {
                $this->deleteService($service);
                continue;
            }

            if ($request->hasFile("services.$id.image")) {
                $file = $request->file("services.$id.image");
                $this->updateImage($service, $file);
            }

            $service->heading = $data['heading'] ?? $service->heading;
            $service->desc = $data['desc'] ?? $service->desc;
            $service->save();
        }
    }

    public function handleNewServices(Request $request)
    {
        if (!$request->has('new_services')) return;

        foreach ($request->new_services as $index => $data) {
            if (empty($data['heading']) && empty($data['desc']) && !($request->hasFile("new_services.$index.image"))) {
                continue;
            }

            $imageName = null;
            if ($request->hasFile("new_services.$index.image")) {
                $file = $request->file("new_services.$index.image");
                $imageName = $this->storeImage($file);
            }

            Service::create([
                'heading' => $data['heading'] ?? null,
                'desc' => $data['desc'] ?? null,
                'image' => $imageName,
            ]);
        }
    }

    public function deleteService(Service $service)
    {
        if ($service->image && File::exists(public_path('upload/' . $service->image))) {
            File::delete(public_path('upload/' . $service->image));
        }
        $service->delete();
    }

    private function updateImage(Service $service, $file)
    {
        if ($service->image && File::exists(public_path('upload/' . $service->image))) {
            File::delete(public_path('upload/' . $service->image));
        }
        $service->image = $this->storeImage($file);
    }

    private function storeImage($file)
    {
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload/services'), $imageName);
        return 'services/' . $imageName;
    }
}
