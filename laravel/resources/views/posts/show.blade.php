@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Dettaglio post</h1>
            <table class="table table-striped table-bordered my-4">
                @foreach ($post->getAttributes() as $key => $value)
                    <tr>
                        <td><strong>{{ $key }}</strong></td>
                        <td>{{ $value }}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td><strong>post status</strong></td>
                        <td>{{ $post->infoPost->post_status }}</td>
                    </tr>
                    <tr>
                        <td><strong>comment status</strong></td>
                        <td>{{ $post->infoPost->comment_status }}</td>
                    </tr>
            </table>
        
        <h2 class="my-5">Commenti</h2>
        
        @foreach ($post->comments as $index=>$comment)
            <div class="bg-white p-3 mb-3">
                <small>{{ $comment->autore }} - {{ $comment->created_at->format('l d/m/Y H:i:s') }}</small>
                <p>{{ $comment->testo }}</p>
            </div>
        @endforeach
    </div>
@endsection

