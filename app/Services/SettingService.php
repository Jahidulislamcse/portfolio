<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingService
{
    public function validateSettings(Request $request): array
    {
        $rules = [
            'home_heading' => 'nullable|string|max:255',
            'home_desc' => 'nullable|string',
            'about_header' => 'nullable|string|max:255',
            'about_desc' => 'nullable|string',
            'branches_header' => 'nullable|string|max:255',
            'branches_desc' => 'nullable|string',
            'mission_vision' => 'nullable|string',
            'company' => 'nullable|string',
            'logo' => 'nullable|image|max:6048',
            'contact_mail' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'google_map' => 'nullable|string|max:1000',
            'twitter' => 'nullable|string',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'skill_images.*' => 'nullable|image|max:5048',
        ];

        return $request->validate($rules);
    }

    public function handleLogoUpload(Request $request, Setting $settings): void
    {
        if (!$request->hasFile('logo')) return;

        if ($settings->logo && File::exists(public_path('upload/' . $settings->logo))) {
            File::delete(public_path('upload/' . $settings->logo));
        }

        $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('upload/settings'), $logoName);
        $settings->logo = 'settings/' . $logoName;
        $settings->save();
    }


    public function handleSkillImages(Request $request, Setting $settings): void
    {
        if (!$request->hasFile('skill_images')) return;

        foreach ($request->file('skill_images') as $image) {
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/skills'), $fileName);

            $settings->skills()->create([
                'image' => 'skills/' . $fileName,
            ]);
        }
    }
}
