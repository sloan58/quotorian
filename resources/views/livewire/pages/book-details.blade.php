<div class="content">
    @include('flash::message')
    <div class="row justify-content-start mb-3">
        <div class="col-12">
            @if($addingQuote)
                <button wire:click="storeQuote" class="btn btn-sm btn-success">Save Quote</button>
                <button wire:click="$toggle('addingQuote')" class="btn btn-sm btn-default">Cancel</button>
            @else
                <button wire:click="$toggle('addingQuote')" class="btn btn-sm btn-info">Add Quote</button>
            @endif
        </div>
    </div>
    @if($addingQuote)
    <div class="row d-flex">
        <div class="col-12 text-center">
            <textarea wire:model="quote" class="form-control" rows="10"></textarea>
        </div>
    </div>
    @endif
    <div class="row justify-content-start {{ $addingQuote ? 'mt-5' : '' }}">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row d-flex justify-content-between align-items-center mx-3">
                        <div class="col-2 pl-0">
                            <img
                                src="{{ $book->thumbnail }}"
                                class="img-responsive"
                                style="min-height: 192px; min-width: 128px;"
                            >
                        </div>
                        <div class="col-8 offset-1">
                            <div class="row">
                                <p class="font-weight-bold">{{ $book->title }}</p>
                            </div>
                            <div class="row">
                                <ul class="list-unstyled">
                                    <li><b>Author:</b> {{ $book->author }}</li>
                                    <li><b>Published:</b> {{ $book->publishedDate }}</li>
                                    <li><b>Pages:</b> {{ $book->pageCount }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mt-4">
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
