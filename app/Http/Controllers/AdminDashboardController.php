<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Message;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $userCount = $users->count();
        $products = Product::all();
        $productCount = $products->count();
        $branches = Branch::all();
        $branchCount = $branches->count();
        $messages = Message::where('status', 'unread')
                   ->latest()
                   ->paginate(10);
        $messageCount = $messages->count(); 
        $brands = Brand::all();
        $brandCount = $brands->count();      

        return view('admin.dashboard', compact('users', 'userCount','branches', 'branchCount', 'messages', 'productCount', 'messageCount', 'brandCount'));
    }
}
