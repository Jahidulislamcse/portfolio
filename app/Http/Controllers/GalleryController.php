<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function showUserGallery()
    {
        $galleries = Gallery::latest()->get(); // Retrieve all images

        return view('gallery', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('upload/galleries'), $imageName);
            $imagePath = 'galleries/' . $imageName;
        }

        Gallery::create([
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Image added successfully!');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'description' => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $gallery->image;

        if ($request->hasFile('image')) {
            if ($imagePath && File::exists(public_path('upload/' . $imagePath))) {
                File::delete(public_path('upload/' . $imagePath));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('upload/gallery'), $imageName);
            $imagePath = 'gallery/' . $imageName;
        }

        $gallery->update([
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && File::exists(public_path('upload/' . $gallery->image))) {
            File::delete(public_path('upload/' . $gallery->image));
        }

        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully!');
    }
}
