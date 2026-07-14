<?php

namespace App\Http\Controllers;

use App\Models\ManagingBody;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManagingBodyController extends Controller
{

    public function index()
    {
        $bodies = ManagingBody::latest()->get();
        return view('admin.managing-body.index', compact('bodies'));
    }

    public function frontendIndex()
    {
        $bodies = ManagingBody::latest()->get();
        return view('managing-body', compact('bodies'));
    }

    public function create()
    {
        return view('admin.managing-body.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'director' => 'required|string|max:255',
            'speech' => 'nullable|string',
            'team_structure' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['director', 'speech', 'team_structure']);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('upload/managing-body'), $imageName);
            $data['image'] = 'managing-body/'.$imageName;
        }

        ManagingBody::create($data);

        return redirect()->route('admin.managing-body.index')->with('success', 'Managing body added successfully.');
    }


    public function edit(ManagingBody $managingBody)
    {
        return view('admin.managing-body.edit', compact('managingBody'));
    }


    public function update(Request $request, ManagingBody $managingBody)
    {
        $request->validate([
            'director' => 'required|string|max:255',
            'speech' => 'nullable|string',
            'team_structure' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['director', 'speech', 'team_structure']);

        if ($request->hasFile('image')) {
            if ($managingBody->image && File::exists(public_path('upload/'.$managingBody->image))) {
                File::delete(public_path('upload/'.$managingBody->image));
            }

            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('upload/managing-body'), $imageName);
            $data['image'] = 'managing-body/'.$imageName;
        }

        $managingBody->update($data);

        return redirect()->route('admin.managing-body.index')->with('success', 'Managing body updated successfully.');
    }


    public function destroy(ManagingBody $managingBody)
    {
        // Delete image if exists
        if ($managingBody->image && File::exists(public_path('upload/'.$managingBody->image))) {
            File::delete(public_path('upload/'.$managingBody->image));
        }

        $managingBody->delete();

        return redirect()->route('admin.managing-body.index')->with('success', 'Managing body deleted successfully.');
    }
}
