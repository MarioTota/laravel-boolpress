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

            <div>
                <label for="immagine">Inserisci l'immagine</label>
                <input type="text" name="immagine" placeholder="Inserisci l'immagine"  id="immagine" value="{{ $post->immagine }}"> 
            </div>
            <div>
                <label for="titolo">Inserisci il titolo</label>
                <input type="text" name="titolo" placeholder="Inserisci il titolo"  id="titolo" value="{{ $post->titolo }}"> 
            </div>
            <div>
                <label for="titolo">Inserisci il sottotitolo</label>
                <input type="text" name="sottotitolo" placeholder="Inserisci il sottotitolo"  id="sottotitolo" value="{{ $post->sottotitolo }}"> 
            </div>
            <div>
                <label for="autore">Inserisci il autore</label>
                <input type="text" name="autore" placeholder="Inserisci il autore"  id="autore" value="{{ $post->autore }}">
            </div>
            <div>
                <label for="testo">Inserisci il testo</label>
                <input type="text" name="testo" placeholder="Inserisci il testo"  id="testo" value="{{ $post->testo }}">
            </div>
            <div>
                <label for="data_pubblicazione">Inserisci la data di pubblicazione</label>
                <input type="date" name="data_pubblicazione" placeholder="Inserisci la data di pubblicazione"  id="data_pubblicazione" value="{{ $post->data_pubblicazione }}">
            </div>
            <div>
                <label for="post_status">stato del post</label>
                <select id="post_status" name="post_status">
                    <option value="draft" {{ $post->infoPost->post_status == 'draft' ? 'selected' : '' }}>draft</option>
                    <option value="public" {{ $post->infoPost->post_status == 'public' ? 'selected' : '' }}>public</option>
                    <option value="private" {{ $post->infoPost->post_status == 'private' ? 'selected' : '' }}>private</option>
                </select>
            </div>
            <div>
                <label for="comment_status">stato dei commenti</label>
                <select id="comment_status" name="comment_status">
                    <option value="open" {{ $post->infoPost->comment_status == 'open' ? 'selected' : '' }}>open</option>
                    <option value="closed" {{ $post->infoPost->comment_status == 'closed' ? 'selected' : '' }}>closed</option>
                    <option value="private" {{ $post->infoPost->comment_status == 'private' ? 'selected' : '' }}>private</option>
                </select>
            </div>

            {{-- @dump($post->tags) --}}
            <h3>Tags</h3>
            @foreach ($tags as $tag)
                <div>
                    <input type="checkbox" id="Tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}"
                    @if ($post->tags->contains($tag->id)) checked @endif
                    >
                    <label for="Tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach

            <button type="submit">Salva</button>                
        
    </form>