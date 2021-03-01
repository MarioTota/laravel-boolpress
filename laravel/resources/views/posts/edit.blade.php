@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('posts.update', $post->id) }}" method="post">       
        
                    @csrf
                    @method('PUT')
        
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif     
        
                    <div class="row  mt-4">
                        <div class="form-group col-3">
                            <label for="immagine">Inserisci il link dell'immagine</label>
                            <input class="form-control" type="text" name="immagine" id="immagine" value="{{ $post->immagine }}"> 
                        </div>
                        <div class="form-group col-3">
                            <label for="titolo">Inserisci il titolo</label>
                            <input class="form-control" type="text" name="titolo" id="titolo" value="{{ $post->titolo }}"> 
                        </div>
                        <div class="form-group col-3">
                            <label for="titolo">Inserisci il sottotitolo</label>
                            <input class="form-control" type="text" name="sottotitolo" id="sottotitolo" value="{{ $post->sottotitolo }}"> 
                        </div>
                        <div class="form-group col-3">
                            <label for="autore">Inserisci l' autore</label>
                            <input class="form-control" type="text" name="autore" id="autore" value="{{ $post->autore }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="testo">Inserisci il testo</label>
                        <textarea class="form-control" name="testo" id="testo" rows="3">{{ $post->testo }}</textarea>
                    </div>
                    <div class="row my-4">
                        <div class="form-group col-4">
                            <label for="data_pubblicazione">Inserisci la data di pubblicazione</label>
                            <input type="date" name="data_pubblicazione" placeholder="Inserisci la data di pubblicazione"  id="data_pubblicazione" value="{{ $post->data_pubblicazione }}">
                        </div>
                        <div class="form-group col-4">
                            <label for="post_status">stato del post</label>
                            <select id="post_status" name="post_status" class="d-block">
                                <option value="draft" {{ $post->infoPost->post_status == 'draft' ? 'selected' : '' }}>draft</option>
                                <option value="public" {{ $post->infoPost->post_status == 'public' ? 'selected' : '' }}>public</option>
                                <option value="private" {{ $post->infoPost->post_status == 'private' ? 'selected' : '' }}>private</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="comment_status">stato dei commenti</label>
                            <select id="comment_status" name="comment_status" class="d-block">
                                <option value="open" {{ $post->infoPost->comment_status == 'open' ? 'selected' : '' }}>open</option>
                                <option value="closed" {{ $post->infoPost->comment_status == 'closed' ? 'selected' : '' }}>closed</option>
                                <option value="private" {{ $post->infoPost->comment_status == 'private' ? 'selected' : '' }}>private</option>
                            </select>
                        </div>
                    </div>
        
                    {{-- @dump($post->tags) --}}
                    <div class="row">
                        <div id="tags" class="col-6">
                            <h3>Tags</h3>
                            @foreach ($tags as $tag)
                                <div>
                                    <input type="checkbox" id="Tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}"
                                    @if ($post->tags->contains($tag->id)) checked @endif
                                    >
                                    <label for="Tag-{{ $tag->id }}">{{ $tag->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        
                        <div id="images" class="col-6">
                            <h3>Immagini</h3>
                            <table>
                                @foreach ($images as $image)
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="Image-{{ $image->id }}" name="images[]" value="{{ $image->id }}"
                                            @if ($post->images->contains($image->id)) checked @endif>
                                            <label for="Image-{{ $image->id }}">{{ $image->alt }}</label>                 
                                        </td>
                                        <td>
                                            <img style="width: 50px;" src="{{ $image->link }}" alt="{{ $image->alt }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
        
                    <button type="submit" class="btn btn-success my-4">Salva</button>                
                
            </form>
    </div>
@endsection
