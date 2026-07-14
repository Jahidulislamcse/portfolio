<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Models\Setting;
use App\Models\Skill;

class SettingController extends Controller
{
    protected SettingService $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        $settings = Setting::first();

        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $this->settingService->validateSettings($request);

        $settings = Setting::first();

        $data = $request->only([
            'home_heading',
            'home_desc',
            'about_header',
            'about_desc',
            'branches_header',
            'branches_desc',
            'mission_vision',
            'contact_mail',
            'phone_number',
            'address',
            'company',
            'google_map',
            'twitter',
            'facebook',
            'linkedin',
        ]);

        if (!$settings) {
            $settings = Setting::create($data);
        } else {
            $settings->update($data);
        }

        $this->settingService->handleSkillImages($request, $settings);

        $this->settingService->handleLogoUpload($request, $settings);

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function skillDestroy($id)
    {
        $skill = Skill::findOrFail($id);

        $path = public_path('upload/' . $skill->image);
        if (file_exists($path)) {
            unlink($path);
        }

        $skill->delete();

        return response()->json(['success' => true]);
    }

}
