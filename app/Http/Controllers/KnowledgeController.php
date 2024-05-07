<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Knowledge;

class KnowledgeController extends Controller
{
    public function getData()
    {
        $knowledge = Knowledge::all();
        $data = [
            'status' => 200,
            'user' => $knowledge
        ];
        return response()->json($data, 200);
    }
}
