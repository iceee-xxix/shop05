<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\Category;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function index()
    {
        $category = Categories::get();
        return view('users.main_page', compact('category'));
    }
}
