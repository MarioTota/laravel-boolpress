<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        // $posts = Post::with(['infoPost','comments','tags'])->get();
        $posts = Post::all();


        return response()->json($posts);
    }
}
