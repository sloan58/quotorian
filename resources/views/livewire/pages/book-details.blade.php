<div class="content">
    @include('flash::message')
    @if(!$addingQuote)
    <div class="row justify-content-center mb-3">
        <div class="col-md-6 col-sm-12">
            <input
                wire:model.debounce.500ms="term"
                class="form-control text-center"
                type="search"
                placeholder="Search Quotes in this Book"
                value="{{ $term }}"
                aria-label="Search">
        </div>
    </div>
    @endif
    <div class="row justify-content-start mb-3">
        <div class="col-12">
            @if($addingQuote)
                <button wire:click="storeQuote" class="btn btn-sm btn-success" {{ empty($quote) ? 'disabled' : '' }}>Save Quote</button>
                <button wire:click="$toggle('addingQuote')" class="btn btn-sm btn-default">Cancel</button>
            @else
                <button wire:click="$toggle('addingQuote')" class="btn btn-sm btn-info">Add Quote</button>
            @endif
        </div>
    </div>
    @if($addingQuote)
    <div class="row d-flex">
        <div class="col-12 text-center">
            <textarea wire:model="quote" class="form-control p-3" rows="10"></textarea>
        </div>
    </div>
    <div class="row mt-2 justify-content-start">
        <div class="col-sm-2 d-flex">
            <input wire:model="pageNumber" type="text" class="form-control form-control-sm mr-2" id="page">
            <label for="page" class="mt-2">Page|Location</label>
        </div>
    </div>
    @endif
    <div class="row justify-content-start {{ $addingQuote ? 'mt-5' : '' }}">
        <div class="col-md-12 col-lg-4 px-sm-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <img
                            src="{{ $book->thumbnail }}"
                            class="img-responsive mb-3"
                            style="min-height: 192px; min-width: 128px;"
                        >
                    </div>
                    <div class="row justify-content-center">
                        <ul class="list-unstyled pl-5 pl-md-0">
                            <li><b>Author:</b> {{ $book->author }}</li>
                            <li><b>Published:</b> {{ $book->publishedDate }}</li>
                            <li><b>Pages:</b> {{ $book->pageCount }}</li>
                        </ul>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <h5><u>Book Description</u></h5>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-10 mt-2">
                            <p>{{ $book->description}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-footer d-flex justify-content-center">
                    <button wire:click="deleteBook" class="btn btn-sm btn-danger">Delete Book From Book Shelf</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <ul class="list-group">
            @foreach($quotes as $quote)
                <livewire:components.quote-card
                    :quote="$quote"
                    :key="time() . $quote->id"
                />
            @endforeach
            </ul>
        </div>
    </div>
</div>
