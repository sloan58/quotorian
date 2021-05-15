<div class="content">
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center mb-3">
            <div class="col-md-6 col-sm-12">
                <input
                    wire:model.debounce.500ms="term"
                    class="form-control text-center"
                    type="search"
                    placeholder="Search Google Books"
                    value="{{ $term }}"
                    aria-label="Search">
            </div>
        </div>
        <div class="row imagetiles d-flex flex-wrap align-items-center">
            @foreach($googleBooks as $googleBook)
            @if(isset($googleBook['volumeInfo']['imageLinks']['thumbnail']))
                    <livewire:google-books-result :googleBook="$googleBook" :key="time() . $googleBook['id']" />
                @endif
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div wire:loading class="spinner-grow text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>
