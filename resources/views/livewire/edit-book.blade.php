<div class="content">
    <div class="container ml-0">
        @include('flash::message')
        <div class="row justify-content-start mb-3">
            <div class="col-12">
                @if($addingQuote)
                <button wire:click="storeQuote" class="btn btn-sm btn-success">Save Quote</button>
                @else
                <button wire:click="$toggle('addingQuote')" class="btn btn-sm btn-info">Add Quote</button>
                @endif
            </div>
        </div>
        @if($addingQuote)
        <div class="row">
            <div class="col-12">
                <textarea wire:model="quote" class="form-control" rows="10"></textarea>
            </div>
        </div>
        @endif
        <div class="row justify-content-start mt-5">
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row d-flex justify-content-start align-items-center mx-3">
                            <div>
                                <img
                                    src="{{ $book->thumbnail }}"
                                    class="img-responsive"
                                    style="min-height: 192px; min-width: 128px;"
                                >
                            </div>
                            <div class="ml-5">
                                <div class="row">
                                    <p class="font-weight-bold">{{ $book->title }}</p>
                                </div>
                                <div class="row">
                                    <ul class="list-unstyled">
                                        <li>Author: {{ $book->author }}</li>
                                        <li>Published: {{ $book->publishedDate }}</li>
                                        <li>Pages: {{ $book->pageCount }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <h5>Book Description</h5>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-10 mt-2">
                                <p>{{ $book->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            @foreach($quotes as $quote)
                <p>{{ $quote->quote }}</p>
            @endforeach
            </div>
        </div>
    </div>
</div>
