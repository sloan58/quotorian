<div class="content">
    @include('flash::message')
    <div class="row justify-content-center mb-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a wire:click.prevent="setActiveTab('quotes')" class="nav-link {{ $activeTab == 'quotes' ? 'active': '' }}" href="#">Quotes</a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent="setActiveTab('details')" class="nav-link {{ $activeTab == 'details' ? 'active': '' }}" href="#">Book Details</a>
            </li>
        </ul>
    </div>
    @if($activeTab == 'quotes')
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
        @if($addingQuote)
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <button wire:click="storeQuote" class="btn btn-sm btn-success" {{ empty($quote) ? 'disabled' : '' }}>Save Quote</button>
                <button wire:click="$toggle('addingQuote')" class="btn btn-sm btn-default">Cancel</button>
            </div>
        </div>
        @else
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="row d-flex justify-content-between px-3 mb-3">
                    <button wire:click="$toggle('addingQuote')" class="btn btn-sm btn-success">Add New Quote</button>
                    @if($filterByFavorites)
                        <button wire:click="$toggle('filterByFavorites')" class="btn btn-info btn-round">
                            <i class="fa fa-heart"></i> Filtered by Favorites
                        </button>
                    @else
                        <button wire:click="$toggle('filterByFavorites')" class="btn btn-outline-info btn-round">
                            <i class="fa fa-heart"></i> Filter by Favorites
                        </button>
                    @endif
                </div>
            </div>
        </div>
        @endif
        @if($addingQuote)
        <div class="row d-flex justify-content-center">
            <div class="col-6 text-center">
                <textarea wire:model="quote" class="form-control p-3" rows="10"></textarea>
            </div>
        </div>
            <div class="row justify-content-center">
                <div class="col-2 text-center mt-2">
                <input wire:model="pageNumber" type="text" class="form-control form-control-sm mr-2" id="page">
                <label for="page" class="mt-2">Page|Location</label>
            </div>
        </div>
        @endif
        <div class="row justify-content-center {{ $addingQuote ? 'mt-5' : '' }}">
            <div class="col-lg-6">
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
    @else
        <div class="col-12 px-sm-2">
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
    @endif
</div>
