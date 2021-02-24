<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .margin {
        margin: 5px 0;
    }
</style>
<body>
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

            <div class="margin">
                <label for="immagine">Inserisci l'immagine</label>
                <input type="text" name="immagine" placeholder="Inserisci l'immagine"  id="immagine" value="{{ old('immagine') }}"> 
            </div class="margin">
            <div class="margin">
                <label for="titolo">Inserisci il titolo</label>
                <input type="text" name="titolo" placeholder="Inserisci il titolo"  id="titolo" value="{{ old('titolo') }}"> 
            </div class="margin">
            <div class="margin">
                <label for="titolo">Inserisci il sottotitolo</label>
                <input type="text" name="sottotitolo" placeholder="Inserisci il sottotitolo"  id="sottotitolo" value="{{ old('sottotitolo') }}"> 
            </div class="margin">
            <div class="margin">
                <label for="autore">Inserisci il autore</label>
                <input type="text" name="autore" placeholder="Inserisci il autore"  id="autore" value="{{ old('autore') }}">
            </div class="margin">
            <div class="margin">
                <label for="testo">Inserisci il testo</label>
                <input type="text" name="testo" placeholder="Inserisci il testo"  id="testo" value="{{ old('testo') }}">
            </div class="margin">
            <div class="margin">
                <label for="data_pubblicazione">Inserisci la data di pubblicazione</label>
                <input type="date" name="data_pubblicazione" placeholder="Inserisci la data di pubblicazione"  id="data_pubblicazione" value="{{ old('data_pubblicazione') }}">
            </div class="margin">
            <div class="margin">
                <label for="post_status">stato del post</label>
                <select id="post_status" name="post_status">
                    <option value="draft" {{ old('post_status') == 'draft' ? 'selected' : '' }}>draft</option>
                    <option value="public" {{ old('post_status') == 'public' ? 'selected' : '' }}>public</option>
                    <option value="private" {{ old('post_status') == 'private' ? 'selected' : '' }}>private</option>
                </select>
            </div class="margin">
            <div class="margin">
                <label for="comment_status">stato dei commenti</label>
                <select id="comment_status" name="comment_status">
                    <option value="open" {{ old('comment_status') == 'open' ? 'selected' : '' }}>open</option>
                    <option value="closed" {{ old('comment_status') == 'closed' ? 'selected' : '' }}>closed</option>
                    <option value="private" {{ old('comment_status') == 'private' ? 'selected' : '' }}>private</option>
                </select>
            </div class="margin">
            <h3>Tags</h3>
            @foreach ($tags as $tag)
                <div class="margin">
                    <input type="checkbox" id="Tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                    <label for="Tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div class="margin">
            @endforeach

            <h3>Images</h3>
                @foreach ($images as $image)
                <div class="margin">
                    <input type="checkbox" id="Image-{{ $image->id }}" name="images[]" value="{{ $image->id }}">
                    <label for="Image-{{ $image->id }}">{{ $image->alt }}                 
                        <img style="width: 50px;" src="{{ $image->link }}" alt="{{ $image->alt }}">
                    </label>
                </div class="margin">
                @endforeach
                
            <div style="margin-top: 40px;">
                <button type="submit">Salva</button>   
                <a href="{{ route('posts.index') }}">Torna all'elelnco</a>         
            </div>

        
    </form>
</body>
</html>