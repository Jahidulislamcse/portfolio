<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Review;
use App\Models\Product;

class HomeService
{
    public function getHomeData(): array
    {
        $settings = Setting::first();
        $reviews  = Review::all();
        $services = Service::all();
        $brands   = Brand::all();

        $allCategories = Category::select('name', 'slug', 'image')->get();

        $categories = Category::with('products.images')->get();
        $selectedCategory = null;


        return compact('settings', 'reviews', 'services', 'brands', 'allCategories', 'categories', 'selectedCategory');

    }
}
