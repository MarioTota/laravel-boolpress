<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\InfoPost;
use App\Tag;
use App\Image;
use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $images = Image::all();

        return view('posts.create', compact('tags' , 'images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $data['slug'] = Str::slug($data['titolo']);

        $post = new Post();
        $post->fill($data);
        $postSaveResult = $post->save();

        $data['post_id'] = $post->id;
        $infoPost = New InfoPost();
        $infoPost->fill($data);
        $infoPostSaveResult = $infoPost->save();

        if ($postSaveResult && !empty($data['tags'])) {
            $post->tags()->attach($data['tags']);
        }        

        if ($postSaveResult && !empty($data['images'])) {
            $post->images()->attach($data['images']);
        }  

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $now = new Carbon();
        // dump($now->toDateTimeString());
        $adesso = Carbon::now();
        dump($adesso->toDateTimeString());
        $oggi = Carbon::today();
        dump($oggi->toDateTimeString());
        $ieri = Carbon::yesterday();
        dump($ieri->toDateTimeString());
        dump($ieri->format('l d/m/Y'));

        $lezionediieri = Carbon::create(2021, 2, 24, 9, 30, 0, 'Europe/Rome');
        dump($lezionediieri->format('l d/m/Y H:i:s'));

        $lastweek = Carbon::createFromFormat('d-m-Y' , '25-02-2021');
        dump($lastweek->format('l d/m/Y H:i:s'));


        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $images = Image::all();


        return view('posts.edit', compact('post' , 'tags' , 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['titolo']);

        $post->update($data);


        $infoPost = $post->infoPost;
        $infoPost = InfoPost::where('post_id',$post->id)->first();
        $data['post_id'] = $post->id;
        $infoPost->update($data);

        if (empty($data['tags'])) {
            $post->tags()->detach();
        } else {
            $post->tags()->sync($data['tags']);
        }

        if (empty($data['images'])) {
            $post->images()->detach();
        } else {
            $post->images()->sync($data['images']);
        }


        return redirect()
        ->route('posts.index')
        ->with('message','Post '.$post->titolo.' aggiornato correttamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}