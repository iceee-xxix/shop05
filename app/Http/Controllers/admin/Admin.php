<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function dashboard()
    {
        $data['function_key'] = __FUNCTION__;
        return view('dashboard', $data);
    }
}
