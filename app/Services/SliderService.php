<?php

namespace App\Services;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderService
{
    public function validateSliders(Request $request)
    {
        $rules = [
            'sliders.*.image' => 'nullable|image|max:2048',
            'sliders.*.heading' => 'nullable|string|max:255',
            'sliders.*.desc' => 'nullable|string',
            'new_slider_images.*' => 'nullable|image|max:2048',
            'new_sliders_heading.*' => 'nullable|string|max:255',
            'new_sliders_desc.*' => 'nullable|string',
        ];

        $request->validate($rules);
    }

    public function handleSliders(Request $request)
    {
        if ($request->has('sliders')) {
            foreach ($request->sliders as $id => $data) {
                $slider = Slider::find($id);
                if (!$slider) continue;

                if (isset($data['delete']) && $data['delete']) {
                    if ($slider->image_path && File::exists(public_path('upload/' . $slider->image_path))) {
                        File::delete(public_path('upload/' . $slider->image_path));
                    }
                    $slider->delete();
                    continue;
                }

                if (isset($data['image']) && $data['image']) {
                    if ($slider->image_path && File::exists(public_path('upload/' . $slider->image_path))) {
                        File::delete(public_path('upload/' . $slider->image_path));
                    }
                    $imageName = time() . '_' . $data['image']->getClientOriginalName();
                    $data['image']->move(public_path('upload/sliders'), $imageName);
                    $slider->image_path = 'sliders/' . $imageName;
                }

                $slider->heading = $data['heading'] ?? $slider->heading;
                $slider->desc = $data['desc'] ?? $slider->desc;
                $slider->save();
            }
        }

        if ($request->hasFile('new_slider_images')) {
            foreach ($request->file('new_slider_images') as $index => $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('upload/sliders'), $imageName);

                Slider::create([
                    'image_path' => 'sliders/' . $imageName,
                    'heading' => $request->new_sliders_heading[$index] ?? null,
                    'desc' => $request->new_sliders_desc[$index] ?? null,
                ]);
            }
        }
    }
}
