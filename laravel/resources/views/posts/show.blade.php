<h1>Dettaglio post</h1>
<button><a href="{{ route('posts.index') }}">torna ai post</a></button>
    <table>
        @foreach ($post->getAttributes() as $key => $value)
            <tr>
                <td><strong>{{ $key }}</strong></td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </table>

<p>post status: {{ $post->infoPost->post_status }}</p>
<p>comment status: {{ $post->infoPost->comment_status }}</p>

<h2>Commenti</h2>

 @foreach ($post->comments as $index=>$comment)
    <div class="single_comment">
        <h3>commento {{$index + 1}}</h3>
        <p style="margin-left: 500px;">{{ $comment->autore }}</p>
        <p>{{ $comment->testo }}</p>
    </div>
@endforeach