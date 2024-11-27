<x-layout>
    <form method="POST" action="#" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Sottotitolo</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}">
            @error('subtitle')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select name="category" id="category" class="form-control">
                <option selected disabled>Seleziona categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Corpo del testo</label>
            <textarea name="body" id="body" class="form-control" rows="7">{{ old('body') }}</textarea>
            @error('body')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-center flex-column align-items-center">
            <button type="submit" class="btn btn-outline-secondary">Inserisci articolo</button>
            <a href="{{ route('homepage') }}" class="text-secondary mt-2">Torna alla home</a>
        </div>


        action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    
    </form>
</x-layout>