@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('posts.store') }}" method="post">       

                @csrf
                @method('POST')

            @if ($errors->any())
                <div>
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
                        <input class="form-control" type="text" name="immagine" id="immagine" value="{{ old('immagine') }}"> 
                    </div>
                    <div class="form-group col-3">
                        <label for="titolo">Inserisci il titolo</label>
                        <input class="form-control" type="text" name="titolo" id="titolo" value="{{ old('titolo') }}"> 
                    </div>
                    <div class="form-group col-3">
                        <label for="titolo">Inserisci il sottotitolo</label>
                        <input class="form-control" type="text" name="sottotitolo" id="sottotitolo" value="{{ old('sottotitolo') }}"> 
                    </div>
                    <div class="form-group col-3">
                        <label for="autore">Inserisci l' autore</label>
                        <input class="form-control" type="text" name="autore" id="autore" value="{{ old('autore') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="testo">Inserisci il testo</label>
                    <textarea class="form-control" name="testo" id="testo" rows="3">{{ old('testo') }}</textarea>
                </div>
                <div class="row my-4">
                    <div class="form-group col-4">
                        <label for="data_pubblicazione">Inserisci la data di pubblicazione</label>
                        <input class="form-control" type="date" name="data_pubblicazione" id="data_pubblicazione" value="{{ old('data_pubblicazione') }}">
                    </div>
                    <div class="form-group col-4">
                        <label for="post_status">Stato del post: </label>
                        <select id="post_status" name="post_status" class="d-block">
                            <option value="draft" {{ old('post_status') == 'draft' ? 'selected' : '' }}>draft</option>
                            <option value="public" {{ old('post_status') == 'public' ? 'selected' : '' }}>public</option>
                            <option value="private" {{ old('post_status') == 'private' ? 'selected' : '' }}>private</option>
                        </select>
                    </div >
                    <div class="form-group col-4">
                        <label for="comment_status">Stato dei commenti: </label>
                        <select id="comment_status" name="comment_status" class="d-block">
                            <option value="open" {{ old('comment_status') == 'open' ? 'selected' : '' }}>open</option>
                            <option value="closed" {{ old('comment_status') == 'closed' ? 'selected' : '' }}>closed</option>
                            <option value="private" {{ old('comment_status') == 'private' ? 'selected' : '' }}>private</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div id="tags" class="col-6">
                        <h3>Tags</h3>
                        @foreach ($tags as $tag)
                            <div class="form-group">
                                <input type="checkbox" id="Tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
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
                                        <input type="checkbox" id="Image-{{ $image->id }}" name="images[]" value="{{ $image->id }}">
                                        <label for="Image-{{ $image->id }}">{{ $image->alt }}</label>                 
                                    </td>
                                    <td>
                                        <img class="my-2" style="width: 50px;" src="{{ $image->link }}" alt="{{ $image->alt }}">
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
