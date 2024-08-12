<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::where('status', 1)->get();
    return view('welcome', compact('products'));
})->name('landing');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->prefix('user')->group(function () {
    
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard'); 

});

Route::middleware(['auth', 'adminMiddleware'])->prefix('admin')->group(function () {
    
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); 
    Route::resource('/products', ProductController::class)->names('admin.products');
    Route::resource('/users', AdminUserController::class)->names('admin.users');

});
