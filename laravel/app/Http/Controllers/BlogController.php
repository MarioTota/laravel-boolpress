<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

// CONTROLLER DEI COMMENTI 

class BlogController extends Controller
{
    public function show($slug) {

        $post = Post::where('slug',$slug)->firstOrFail();

        // if(empty($post)) {
        //     abort('404');
        // }

        return view('comments.show', compact('post'));
    }

    public function addcomment(Request $request, $id) {
        $data = $request->all();
        // dd($data);
        $data['post_id'] = $id;
        $newComment = New Comment();

        $newComment->fill($data);

        // $newComment->autore = $data['autore'];
        // $newComment->testo = $data['messaggio'];
        // $newComment->post_id = $id;

        $newComment->save();

        $post = Post::findOrFail($id);

        return redirect()
            ->route('showcomment', $post->slug);
    }
}
