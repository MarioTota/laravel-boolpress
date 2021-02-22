<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <style>
       
    </style>
        
    </head>
    <body>
        {{-- @dd($post->comments) --}}

        <h1>Commenti post</h1>
        <div class="posts_container">
            @foreach ($post->comments as $index=>$comment)
                <div class="single_comment">
                    <h3>commento n. {{$index}}</h3>
                    <p>{{ $comment->testo }}</p>
                    <p>{{ $comment->autore }}</p>
                </div>
            @endforeach

            <form action="{{ route('addcomment',$post->id) }}" method="POST">

                @method('POST')
                @csrf

                <label for="autore">Inerisci il tuo nickname</label>
                <input type="text" name="autore" id="autore">

                <label for="testo">inserisci il messaggio</label>
                <textarea name="testo" id="testo" cols="30" rows="2"></textarea>

                <input type="submit" value="Invia">

            </form>
        </div>
    </body>
</html>
