<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'new_review_images.*' => 'nullable|image|max:1024',
            'reviews.*.image' => 'nullable|image|max:1024',
            'reviews.*.name' => 'required|string|max:255',
            'reviews.*.designation' => 'nullable|string|max:255',
            'reviews.*.comment' => 'required|string',
        ]);

        if ($request->has('reviews')) {
            foreach ($request->reviews as $id => $data) {
                $review = Review::find($id);
                if (!$review) continue;

                if (isset($data['delete']) && $data['delete']) {
                    if ($review->image && File::exists(public_path('upload/' . $review->image))) {
                        File::delete(public_path('upload/' . $review->image));
                    }
                    $review->delete();
                    continue;
                }

                if (isset($data['image']) && $data['image']) {
                    if ($review->image && File::exists(public_path('upload/' . $review->image))) {
                        File::delete(public_path('upload/' . $review->image));
                    }
                    $imageName = time() . '_' . $data['image']->getClientOriginalName();
                    $data['image']->move(public_path('upload/reviews'), $imageName);
                    $review->image = 'reviews/' . $imageName;
                }

                $review->name = $data['name'] ?? $review->name;
                $review->designation = $data['designation'] ?? $review->designation;
                $review->comment = $data['comment'] ?? $review->comment;
                $review->save();
            }
        }

        if ($request->hasFile('new_review_images')) {
            foreach ($request->file('new_review_images') as $index => $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('upload/reviews'), $imageName);

                Review::create([
                    'image' => 'reviews/' . $imageName,
                    'name' => $request->new_reviews_name[$index] ?? 'Client',
                    'designation' => $request->new_reviews_designation[$index] ?? null,
                    'comment' => $request->new_reviews_comment[$index] ?? '',
                ]);
            }
        }

        return redirect()->back()->with('success', 'Reviews saved successfully.');
    }
}
