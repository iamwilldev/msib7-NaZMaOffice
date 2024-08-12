<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(10)->get();

        $data = [
            'totalProducts' => Product::count(),
            'totalProductsActive' => Product::where('status', 1)->count(),
            'totalUsers' => User::count(),
            'totalUsersActive' => User::whereNotNull('email_verified_at')->count(),
        ];
        
        return view('admin.dashboard', compact('products', 'data'));
    }
}
