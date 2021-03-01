@extends('layouts.app')

@section('content') 
    <div class="container">
        <h1 class="my-4">Il mio Blog</h1>
        <div class="row">
            @foreach ($posts as $post)
                <div class="card col-3 m-4">
                    <img class="card-img-top" src="{{ $post->immagine ? $post->immagine : asset('images/placeholder.jpg') }}" alt="{{ $post->titolo }}">
                    <div class="card-body">
                        @foreach ($post->tags as $tag)
                            <span class="badge badge-success my-3">{{ $tag->name }}</span>
                        @endforeach
                        <h2>{{ $post->titolo }}</h2>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('post', $post->slug) }}">Leggi</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection