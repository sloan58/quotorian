<div class="content">
    <div class="container">
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
                    <livewire:google-books-result :googleBook="$googleBook" />
                @endif
            @endforeach
        </div>
    </div>
</div>
