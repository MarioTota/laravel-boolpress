@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        body {
            background: #eee
        }
    
        .date {
            font-size: 11px
        }
    
        .comment-text {
            font-size: 12px
        }
    
        .fs-12 {
            font-size: 12px
        }
    
        .shadow-none {
            box-shadow: none
        }
    
        .name {
            color: #007bff
        }
    
        .cursor:hover {
            color: blue
        }
    
        .cursor {
            cursor: pointer
        }
    
        .textarea {
            resize: none
        }
    </style>
    
        <img class="my-5 img-fluid" src="{{ $post->immagine ? $post->immagine : asset('images/placeholder.jpg') }}" alt="{{ $post->titolo }}">
        <h1>{{ $post->titolo }}</h1>
        {{-- tags --}}
            @foreach ($post->tags as $tag)
                <span class="badge badge-success mb-4">{{ $tag->name }}</span>
            @endforeach
        {{--/tags --}}
        <h3>{{ $post->sottotitolo }}</h3>
        <small>{{ $post->autore }} {{ $post->data_pubblicazione }}</small>
        <p class="my-5">{{ $post->testo }}</p>
    
        <div class="mb-4">
            @foreach ($post->images as $image)
                <div>
                    <figure>
                        <img style="width:200px;" src="{{ $image->link }}" alt="{{ $image->alt }}">
                        <figcaption>{{ $image->caption }}</figcaption>
                    </figure>
                </div>   
            @endforeach
        </div>
    
    
    
        {{-- <p>post status: {{ $post->infoPost->post_status }}</p>
        <p>comment status: {{ $post->infoPost->comment_status }}</p> --}}
    
    
        @if($post->infoPost->comment_status == 'open')    
        <div class="comments">
                <h2>Commenti</h2>
                @foreach ($post->comments as $comment)
                    <div class="bg-white p-3 mb-3">
                        <small>{{ $comment->autore }} - {{ $comment->created_at->format('l d/m/Y H:i:s') }}</small>
                        <p>{{ $comment->testo }}</p>
                    </div>
                @endforeach
    
                <form action="{{ route('addcomment',$post->id) }}" method="POST">
                    @method('POST')
                    @csrf
    
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
        
                    <div class="form-group my-4 col-3">
                        <label for="autore">Inerisci il tuo nickname</label>
                        <input type="text" class="form-control" id="autore" name="autore" placeholder="inserisci nickname">
                    </div>
    
                    <div class="form-group my-4 col-3">
                        <label for="testo">inserisci il messaggio</label>
                        <textarea class="form-control" name="testo" id="testo" cols="30" rows="2"></textarea>
                    </div>
    
                    <input type="submit" value="Invia" class="btn-success my-4">
                </form>
            </div>
        @endif
</div>
@endsection
