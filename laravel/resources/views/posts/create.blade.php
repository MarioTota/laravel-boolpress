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

                <label for="titolo">Inserisci il titolo</label>
                <input type="text" name="titolo" placeholder="Inserisci il titolo"  id="titolo" value="{{ old('titolo') }}"> 
            {{-- @error('nome')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}

                <label for="autore">Inserisci il autore</label>
                <input type="text" name="autore" placeholder="Inserisci il autore"  id="autore" value="{{ old('autore') }}">

                <label for="testo">Inserisci il testo</label>
                <input type="text" name="testo" placeholder="Inserisci il testo"  id="testo" value="{{ old('testo') }}">

                <label for="categoria">Inserisci la categoria</label>
                <input type="text" name="categoria" placeholder="Inserisci la categoria"  id="categoria" value="{{ old('categoria') }}">

                <label for="commenti">Inserisci quanti commenti</label>
                <input type="text" name="commenti" placeholder="Inserisci quanti commenti"  id="commenti" value="{{ old('commenti') }}">

            <button type="submit">Salva</button>           
        
    </form>