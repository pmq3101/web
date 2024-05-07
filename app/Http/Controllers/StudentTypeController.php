<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\StudentType;

class StudentTypeController extends Controller
{
    public function getData()
    {
        $type = StudentType::all();
        $data = [
            'status' => 200,
            'type' => $type
        ];
        return response()->json($data, 200);
    }
}
