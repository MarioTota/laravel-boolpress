<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
         img {
            height: 60px;
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
        <button>
          <a href="{{ route('posts.create') }}">crea post</a>
        </button>
        {{-- <div class="posts_container">
            @foreach ($posts as $post)   
            <div class="single_post">
                <a class="linkpost" href="{{ route('showPost',  $post->slug) }}">
                    <img src="{{ $post->immagine }}" alt="">
                    <p>titolo: {{ $post->titolo }}</p>
                    <p>titolo: {{ $post->sottotitolo }}</p>
                    <p>autore: {{ $post->autore }}</p>
                    <p>autore: {{ $post->data_pubblicazione }}</p>
                </a>
            </div>
            @endforeach
        </div> --}}
        <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>immagine</th>
                        <th>titolo</th>
                        <th>sottotitolo</th>
                        <th>autore</th>
                        <th>Post status</th>
                        <th>Comment status</th>
                        <th>data_pubblicazione</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><img src="{{ $post->immagine }}" alt=""></td>   
                            <td>{{ $post->titolo }}</td>
                            <td>{{ $post->sottotitolo }}</td>
                            <td>{{ $post->autore }}</td>
                            <td>{{ $post->infoPost->post_status }}</td>
                            <td>{{ $post->infoPost->comment_status }}</td>
                            <td>{{ $post->data_pubblicazione }}</td>
                            <td style="text-align: center;">
                                <a href="{{ route('posts.show',  ['post' => $post->id]) }}">mostra</a>
                                <a href="{{ route('posts.edit', ['post' => $post->id]) }}">modifica</a>
                                <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit">elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </body>
</html>
</body>
</html>