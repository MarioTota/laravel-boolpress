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

            <div>
                <label for="immagine">Inserisci l'immagine</label>
                <input type="text" name="immagine" placeholder="Inserisci l'immagine"  id="immagine" value="{{ old('immagine') }}"> 
            </div>
            <div>
                <label for="titolo">Inserisci il titolo</label>
                <input type="text" name="titolo" placeholder="Inserisci il titolo"  id="titolo" value="{{ old('titolo') }}"> 
            </div>
            <div>
                <label for="titolo">Inserisci il sottotitolo</label>
                <input type="text" name="sottotitolo" placeholder="Inserisci il sottotitolo"  id="sottotitolo" value="{{ old('sottotitolo') }}"> 
            </div>
            <div>
                <label for="autore">Inserisci il autore</label>
                <input type="text" name="autore" placeholder="Inserisci il autore"  id="autore" value="{{ old('autore') }}">
            </div>
            <div>
                <label for="testo">Inserisci il testo</label>
                <input type="text" name="testo" placeholder="Inserisci il testo"  id="testo" value="{{ old('testo') }}">
            </div>
            <div>
                <label for="data_pubblicazione">Inserisci la data di pubblicazione</label>
                <input type="date" name="data_pubblicazione" placeholder="Inserisci la data di pubblicazione"  id="data_pubblicazione" value="{{ old('data_pubblicazione') }}">
            </div>
            <div>
                <label for="post_status">stato del post</label>
                <select id="post_status" name="post_status">
                    <option value="draft" {{ old('post_status') == 'draft' ? 'selected' : '' }}>draft</option>
                    <option value="public" {{ old('post_status') == 'public' ? 'selected' : '' }}>public</option>
                    <option value="private" {{ old('post_status') == 'private' ? 'selected' : '' }}>private</option>
                </select>
            </div>
            <div>
                <label for="comment_status">stato dei commenti</label>
                <select id="comment_status" name="comment_status">
                    <option value="open" {{ old('comment_status') == 'open' ? 'selected' : '' }}>open</option>
                    <option value="closed" {{ old('comment_status') == 'closed' ? 'selected' : '' }}>closed</option>
                    <option value="private" {{ old('comment_status') == 'private' ? 'selected' : '' }}>private</option>
                </select>
            </div>
            <h3>Tags</h3>
            @foreach ($tags as $tag)
                <div>
                    <input type="checkbox" id="Tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                    <label for="Tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach

            <div style="margin-top: 200px;">
                <button type="submit">Salva</button>   
                <a href="{{ route('posts.index') }}">Torna all'elelnco</a>         
            </div>

        
    </form>