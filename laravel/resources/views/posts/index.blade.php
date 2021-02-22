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
        .linkpost {
            text-decoration: none;
            color: black;
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
                <a class="linkpost" href="{{ route('posts.show', ['post' => $post->id]) }}">
                    <p>titolo: {{ $post->titolo }}</p>
                    <p>autore: {{ $post->autore }}</p>
                    <p>{{ substr($post->testo, 60) }}...</p>
                    <p>categoria: {{ $post->categoria }}</p>
                </a>
                    <a href="{{ route('showcomment', $post->slug) }}">Commenti : {{ dd($post->infopost->commenti) }}</a>
            </div>
            @endforeach
            <div class="single_post hidden"></div>
            <div class="single_post hidden"></div>
            <div class="single_post hidden"></div>
        </div>
        <button>
          <a href="{{ route('posts.create') }}">crea post</a>
        </button>
    </body>
</html>