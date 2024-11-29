<x-layout>
    {{-- Messaggi di successo o errore --}}
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif

    {{-- Intestazione --}}
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">The Aulab Post</h1>
            </div>
        </div>
    </div>

    {{-- Lista Articoli --}}
    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card" style="width: 18rem;">
                        {{-- Immagine dell'articolo --}}
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="Immagine dell'articolo">
                        <div class="card-body">
                            {{-- Titolo e sottotitolo --}}
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-subtitle">{{ $article->subtitle }}</p>
                            <p class="small text-muted">
                                Categoria:
                                <a href="{{ route('article.byCategory', $article->category) }}" class="text-capitalize">
                                    {{ $article->category->name }}
                                </a>
                            </p>
                        </div>
                        {{-- Informazioni aggiuntive --}}
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p>Redatto il {{ $article->created_at->format('d/m/Y') }} da:
                                <a href="{{ route('article.byUser', $article->user) }}" class="text-capitalize fw-bold">
                                    {{ $article->user->name }}
                                </a>
                            </p>
                            {{-- Link all'articolo --}}
                            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>