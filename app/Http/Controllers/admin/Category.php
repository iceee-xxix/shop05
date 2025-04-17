<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Category extends Controller
{
    public function category()
    {
        $data['function_key'] = __FUNCTION__;
        return view('category',$data);
    }
}
