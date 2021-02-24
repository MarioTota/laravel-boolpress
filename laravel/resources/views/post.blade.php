<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <img src="{{ $post->immagine }}" alt="">
    <h1>{{ $post->titolo }}</h1>
    {{-- tags --}}
        @foreach ($post->tags as $tag)
            <button>{{ $tag->name }}</button>
        @endforeach
    {{--/tags --}}
    <h3>{{ $post->sottotitolo }}</h3>
    <small>{{ $post->autore }} {{ $post->data_pubblicazione }}</small>
    <p>{{ $post->testo }}</p>
    <p>post status: {{ $post->infoPost->post_status }}</p>
    <p>comment status: {{ $post->infoPost->comment_status }}</p>


    @if($post->infoPost->comment_status == 'open')    
        <h2>Commenti</h2>
        <div class="comments">
            @foreach ($post->comments as $comment)
                <div>
                    <p>{{ $comment->testo }}</p>
                    <small>{{ $comment->autore }} - {{ $comment->created_at }}</small>
                </div>
            @endforeach

            <form action="{{ route('addcomment',$post->id) }}" method="POST">
                @method('POST')
                @csrf

                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div style="margin-top: 50px;">
                    <label for="autore">Inerisci il tuo nickname</label>
                    <input type="text" name="autore" id="autore">
                </div>

                <div style="margin-top: 10px;">
                    <label for="testo">inserisci il messaggio</label>
                    <textarea name="testo" id="testo" cols="30" rows="2"></textarea>
                </div>

                <input type="submit" value="Invia">
            </form>
        </div>
    @endif

    <button><a href="{{ route('blog') }}">torna al blog</a></button>
</body>
</html>