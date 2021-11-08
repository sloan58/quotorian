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
    <div class="card-header text-right pt-0">
        @if($quote->favorite)
            <button wire:click="$toggle('favorited')" class="btn btn-sm btn-warning btn-fab btn-icon btn-round px-2 mt-2">
                <i class="fa fa-heart"></i>
            </button>
        @else
            <button wire:click="$toggle('favorited')" class="btn btn-sm btn-default btn-fab btn-icon btn-round px-2 mt-2">
                <i class="fa fa-heart"></i>
            </button>
        @endif
    </div>
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

    <div class="card-footer d-flex justify-content-start">
        @if($isEditing)
            <div>
                <button wire:click="updateQuote" class="btn btn-sm btn-success">Save</button>
                <button wire:click="$toggle('isEditing')" class="btn btn-sm btn-default">Cancel</button>
            </div>
        @else
            <button wire:click="deleteQuote" class="btn btn-sm btn-danger btn-fab btn-icon btn-round px-2 mt-1">
                <i class="fa fa-trash"></i>
            </button>
            <button wire:click="$toggle('isEditing')" class="btn btn-sm btn-info btn-fab btn-icon btn-round px-2 mx-2 mt-1">
                <i class="fa fa-pencil"></i>
            </button>
        @endif
    </div>
</div>
