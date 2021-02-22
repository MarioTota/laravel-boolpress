<h1>Dettaglio post</h1>
    <table class="table table-dark table-striped table-bordered">
        @foreach ($post->getAttributes() as $key => $value)
            <tr>
                <td><strong>{{ $key }}</strong></td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </table>