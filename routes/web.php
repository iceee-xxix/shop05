<?php

use App\Http\Controllers\admin\Admin;
use App\Http\Controllers\admin\Category;
use App\Http\Controllers\admin\Menu;
use App\Http\Controllers\AuthController;
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

Route::get('/main', function () {
    return view('users.main_page');
});
Route::get('/detail', function () {
    return view('users.detail_page');
});
Route::get('/buy', function () {
    return view('users.list_page');
});
Route::get('/total', function () {
    return view('index');
});

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/auth', [AuthController::class, 'login']);
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['checkLogin'])->name('admin');

Route::middleware('checkLogin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('checkLogin')->group(function () {
    Route::get('/admin', [Admin::class, 'dashboard'])->name('dashboard');
    //หมวดหมู่
    Route::get('/admin/category', [Category::class, 'category'])->name('category');
    Route::post('/admin/category/listData', [Category::class, 'categorylistData'])->name('categorylistData');
    Route::get('/admin/category/create', [Category::class, 'CategoryCreate'])->name('CategoryCreate');
    Route::get('/admin/category/edit/{id}', [Category::class, 'CategoryEdit'])->name('CategoryEdit');
    Route::post('/admin/category/delete', [Category::class, 'CategoryDelete'])->name('CategoryDelete');
    Route::post('/admin/category/save', [Category::class, 'CategorySave'])->name('CategorySave');

    //เมนูอาหาร
    Route::get('/admin/menu', [Menu::class, 'menu'])->name('menu');
    Route::post('/admin/menu/menulistData', [Menu::class, 'menulistData'])->name('menulistData');
    Route::get('/admin/menu/create', [Menu::class, 'MenuCreate'])->name('MenuCreate');
    Route::get('/admin/menu/edit/{id}', [Menu::class, 'menuEdit'])->name('menuEdit');
    Route::post('/admin/menu/delete', [Menu::class, 'menuDelete'])->name('menuDelete');
    Route::post('/admin/menu/save', [Menu::class, 'menuSave'])->name('menuSave');
    //กำหนดราคาอาหาร
    Route::get('/admin/menuOption/{id}', [Menu::class, 'menuOption'])->name('menuOption');
    Route::post('/admin/menu/menulistOption', [Menu::class, 'menulistOption'])->name('menulistOption');
    Route::get('/admin/menu/menulistOptionCreate/{id}', [Menu::class, 'menulistOptionCreate'])->name('menulistOptionCreate');
    Route::post('/admin/menu/menuOptionSave', [Menu::class, 'menuOptionSave'])->name('menuOptionSave');
    Route::post('/admin/menu/menuOptionUpdate', [Menu::class, 'menuOptionUpdate'])->name('menuOptionUpdate');
    Route::get('/admin/menu/menuOptionEdit/{id}', [Menu::class, 'menuOptionEdit'])->name('menuOptionEdit');
});


require __DIR__ . '/auth.php';
