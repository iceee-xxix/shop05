<?php

use App\Http\Controllers\admin\Admin;
use App\Http\Controllers\admin\Category;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [Admin::class, 'dashboard'])->name('dashboard');
    //หมวดหมู่
    Route::get('/admin/category', [Category::class, 'category'])->name('category');
    Route::post('/admin/category/listData', [Category::class, 'categorylistData'])->name('categorylistData');
    Route::get('/admin/category/create', [Category::class, 'CategoryCreate'])->name('CategoryCreate');
    Route::get('/admin/category/edit/{id}', [Category::class, 'CategoryEdit'])->name('CategoryEdit');
    Route::post('/admin/category/save', [Category::class, 'CategorySave'])->name('CategorySave');
});


require __DIR__ . '/auth.php';
