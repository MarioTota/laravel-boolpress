<?php

use Illuminate\Support\Facades\Route;
use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// rotte dei post
Route::get('/', function () {
    $posts = Post::all();
    return view('posts.index', compact('posts'));
});
Route::resource('posts', 'PostController');

// rotte dei commenti
Route::get('/blog/{slug}','BlogController@show')->name('showcomment');
Route::post('/blog/{id}/comment','BlogController@addComment')->name('addcomment');
