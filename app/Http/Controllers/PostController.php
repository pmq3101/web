<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Post;

class PostController extends Controller
{
    public function getData()
    {
        $post = Post::all();
        $data = [
            'status' => 200,
            'post' => $post
        ];
        return response()->json($data, 200);
    }
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        $data = [
            'status' => 200,
            'message' => 'data deleted successfully'
        ];
        return response()->json($data, 200);
    }
}
