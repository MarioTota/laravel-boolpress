<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <style>
        .posts_container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center
        }
        .single_post {
            border: 1px solid black;
            width: 250px;
            height: 250px;
            margin: 10px;
            padding: 10px;
        }
        .hidden {
            visibility: hidden;
        }
    </style>
        
    </head>
    <body>
        <h1>Posts</h1>
        <div class="posts_container">
            @foreach ($posts as $post)   
            <div class="single_post">
                <p>{{ $post->titolo }}</p>
                <p>{{ $post->autore }}</p>
                <p>{{ substr($post->testo, 60) }}...</p>
                <p>{{ $post->categoria }}</p>
                <a href="{{ route('posts.show', ['post' => $post->id]) }}">Commenti : {{ $post->infopost->commenti }}</a>
            </div>
            @endforeach
            <div class="single_post hidden"></div>
            <div class="single_post hidden"></div>
            <div class="single_post hidden"></div>
        </div>
    </body>
</html>
