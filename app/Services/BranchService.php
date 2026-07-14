<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BranchService
{

    public function validateBranch(Request $request)
    {
        return $request->validate([
            'link' => 'nullable|string|max:255',
            'admin_link' => 'nullable|string|max:255',
            'account' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);
    }


    public function handleImageUpload(Request $request, $existingImage = null)
    {
        $imagePath = $existingImage;

        if ($request->hasFile('image')) {
            if ($existingImage && File::exists(public_path('upload/' . $existingImage))) {
                File::delete(public_path('upload/' . $existingImage));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('upload/branches'), $imageName);
            $imagePath = 'branches/' . $imageName;
        }

        return $imagePath;
    }
}
