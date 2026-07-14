<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Services\SliderService;

class SliderController extends Controller
{
    protected SliderService $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        // Validate image size and type
        $request->validate([
            'new_slider_images.*' => 'nullable|image|max:1024', // 1MB = 1024KB
            'sliders.*.image' => 'nullable|image|max:1024',
        ]);

        // Delegate to service
        $this->sliderService->handleSliders($request);

        return redirect()->back()->with('success', 'Sliders saved successfully.');
    }
}