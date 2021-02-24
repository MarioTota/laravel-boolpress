<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .container {

    }
    .card {
        width: 200px;
        border: 1px solid black;
        display: inline-block;
        margin: 10px;
        padding: 5px;
    }
    .card img {
        width: 100%;
    }
</style>
<body>
    <h1>Il mio blog</h1>
    <a href="{{ route('posts.create') }}">crea post</a>

    <div class="container">
        @foreach ($posts as $post)
        <div class="card">
            <img src="{{ $post->immagine }}" alt="{{ $post->titolo }}">
            <button><a href="{{ route('posts.edit', ['post' => $post->id]) }}">Modifica post</a></button>
                <h3>{{ $post->titolo }}</h3>
                    @foreach ($post->tags as $tag)
                        <button>{{ $tag->name }}</button>
                    @endforeach
                <a href="{{ route('post', $post->slug) }}">Leggi</a>
            </div>
        @endforeach
</body>
</html>