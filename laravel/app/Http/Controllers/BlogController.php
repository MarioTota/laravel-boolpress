<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{
    // dettaglio post front end
     public function index() {
         
        $posts = Post::all();
        return view('blog', compact('posts'));
    }

     public function show($slug) {
        $post = Post::where('slug',$slug)->firstOrFail();

        return view('post', compact('post'));
    }

     public function addcomment(Request $request, $id) {
        $data = $request->all();
        $data['post_id'] = $id;

        $newComment = New Comment();

        $newComment->fill($data);

        // $newComment->autore = $data['autore'];
        // $newComment->testo = $data['messaggio'];
        // $newComment->post_id = $id;

        $newComment->save();

        $post = Post::findOrFail($id);

        return redirect()
            ->route('post', $post->slug);
    }
}
