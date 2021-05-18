<div class="content">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6 col-sm-12">
                <input
                    wire:model.debounce.500ms="term"
                    class="form-control text-center"
                    type="search"
                    placeholder="Search Bookshelf"
                    value="{{ $term }}"
                    aria-label="Search">
            </div>
        </div>
        <div class="row imagetiles d-flex flex-wrap align-items-center">
            @foreach($books as $book)
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 mb-2 h-100">
                <a href="{{ route('book.edit', $book) }}">
                    <img src={{ $book->thumbnail }} class="img-responsive">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
