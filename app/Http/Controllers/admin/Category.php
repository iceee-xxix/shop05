<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class Category extends Controller
{
    public function category()
    {
        $data['function_key'] = __FUNCTION__;
        return view('category', $data);
    }

    public function categorylistData()
    {
        $data = [
            'status' => false,
            'message' => '',
            'data' => []
        ];
        $category = Categories::where('deleted_at')->get();

        if (count($category) > 0) {
            $info = [];
            foreach ($category as $rs) {
                $action = '<a href="' . route('CategoryEdit', $rs->id) . '" class="btn btn-sm btn-outline-primary" title="แก้ไข"><i class="bx bx-edit-alt"></i></a>
                <a href="' . route('CategoryEdit', $rs->id) . '" class="btn btn-sm btn-outline-danger" title="ลบ"><i class="bx bxs-trash"></i></a>';
                $info[] = [
                    'name' => $rs->name,
                    'icon' => $rs->icon,
                    'action' => $action
                ];
            }
            $data = [
                'data' => $info,
                'status' => true,
                'message' => 'success'
            ];
        }
        return response()->json($data);
    }
}
