@extends('layouts.app')

@section('content')
    <style>
        a {
            text-decoration: none;
            color: white;
            margin: 5px 0;
        }
        button {
            display: inline-block;
        }
    </style>
    <div class="container">
        <table class="table table-striped table-bordered my-4">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><img style="width: 150px;" src="{{ $post->immagine ? $post->immagine : asset('images/placeholder.jpg') }}" alt="{{ $post->titolo }}"></td>   
                        <td>{{ $post->titolo }}</td>
                        <td>{{ $post->sottotitolo }}</td>
                        <td>{{ $post->autore }}</td>
                        <td>{{ $post->infoPost->post_status }}</td>
                        <td>{{ $post->infoPost->comment_status }}</td>
                        <td>{{ $post->data_pubblicazione }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('posts.show',  ['post' => $post->id]) }}" class="btn btn-success">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-success">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" style="display: inline-block;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>                   
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
