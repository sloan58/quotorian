<div class="card">
    @if($isEditing)
    <div class="card-body">
        <textarea
            wire:model="newQuote"
            class="form-control p-3"
            rows="10"
            >
        </textarea>
        <div class="row mt-2 justify-content-start">
            <div class="col-12 d-flex">
                <input wire:model="newPageNumber" value="{{ $newPageNumber }}" type="text" class="form-control form-control-sm mr-2" id="page">
                <label for="page" class="mt-2">Page|Location</label>
            </div>
        </div>
    </div>
    @else
    <div class="card-body">
        {!! nl2br($quote->quote) !!}
        @if($quote->page_number)
        <div class="text-right">
            <p class="font-weight-light mt-2">Page: {{ $quote->page_number }}</p>
        </div>
        @endif
        <hr class="m-0">
    </div>
    @endif

    <div class="card-footer d-flex justify-content-between">
        @if($isEditing)
            <div>
                <button wire:click="updateQuote" class="btn btn-sm btn-success">Save</button>
                <button wire:click="$toggle('isEditing')" class="btn btn-sm btn-default">Cancel</button>
            </div>
        @else
            <button wire:click="$toggle('isEditing')" class="btn btn-sm btn-info">Edit</button>
            @if($quote->favorite)
            <button wire:click="$toggle('favorited')" class="btn btn-outline-danger btn-round px-2">
                <i class="fa fa-heart"></i> Favorite
            </button>
            @else
            <button wire:click="$toggle('favorited')" class="btn btn-default btn-fab btn-icon btn-round">
                <i class="fa fa-heart"></i>
            </button>
            @endif
            <button wire:click="deleteQuote" class="btn btn-sm btn-danger">Delete</button>
        @endif
    </div>
</div>
