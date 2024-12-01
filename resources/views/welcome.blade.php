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
                <x-article-card :article="$article" />
            </div>
        @endforeach
        </div>
    </div>
</x-layout>