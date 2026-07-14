<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function userProductsByCategory(Request $request)
    {
        $setting = Setting::first();
        $allCategories = Category::select('name', 'slug', 'image')->get();

        if ($request->ajax()) {
            $categorySlug = $request->input('category');

            if ($categorySlug && $categorySlug !== 'all') {
                $categories = Category::where('slug', $categorySlug)
                    ->with('products.images')
                    ->get();
            } else {
                $categories = Category::with('products.images')->get();
            }

            $html = view('products.partials.products-grid', compact('categories'))->render();

            return response()->json(['html' => $html]);
        }

        $categories = Category::with('products.images')->get();
        $selectedCategory = null;

        return view('products.index', compact('categories', 'setting', 'allCategories', 'selectedCategory'));
    }



    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['category', 'images'])
            ->firstOrFail();

        return view('products.show', compact('product'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'description' => 'nullable|string',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $imageName = time() . '_' . $request->file('cover_image')->getClientOriginalName();
            $request->file('cover_image')->move(public_path('upload/products'), $imageName);
            $coverPath = 'products/' . $imageName;
        }

        $slug = Str::slug($request->name);

        $originalSlug = $slug;
        $count = 1;
        while (\App\Models\Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $product = Product::create([
            'name'        => $request->name,
            'slug'        => $slug,
            'category_id' => $request->category_id,
            'cover_image' => $coverPath,
            'description' => $request->description,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/product_images'), $imageName);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $imageName,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('images');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'description' => 'nullable|string',
        ]);

        $coverPath = $product->cover_image;

        if ($request->hasFile('cover_image')) {
            if ($coverPath && File::exists(public_path('upload/' . $coverPath))) {
                File::delete(public_path('upload/' . $coverPath));
            }

            $imageName = time() . '_' . $request->file('cover_image')->getClientOriginalName();
            $request->file('cover_image')->move(public_path('upload/products'), $imageName);
            $coverPath = 'products/' . $imageName;
        }

        $slug = $product->slug;
        if ($product->name !== $request->name) {
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;
            while (\App\Models\Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
        }

        $product->update([
            'name'        => $request->name,
            'slug'        => $slug,
            'category_id' => $request->category_id,
            'cover_image' => $coverPath,
            'description' => $request->description,
        ]);

        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/product_images'), $imageName);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $imageName,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->cover_image && File::exists(public_path('upload/' . $product->cover_image))) {
            File::delete(public_path('upload/' . $product->cover_image));
        }

        foreach ($product->images as $image) {
            if (File::exists(public_path('upload/' . $image->image))) {
                File::delete(public_path('upload/' . $image->image));
            }
            $image->delete();
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function destroyImage($id)
    {
        $image = ProductImage::findOrFail($id);

        if ($image->image && File::exists(public_path('upload/' . $image->image))) {
            File::delete(public_path('upload/' . $image->image));
        }

        $image->delete();
        return response()->json(['success' => true]);
    }
}
