<div class="card">
    <div class="card-body">
        @if($isEditing)
            <textarea
                wire:model="newQuote"
                class="form-control"
                rows="10"
                >
            </textarea>
        @else
        {{ $quote->quote }}
        @endif
    </div>
    <hr>
    <div class="card-footer d-flex justify-content-between">
        @if($isEditing)
        <div>
            <button wire:click="updateQuote" class="btn btn-sm btn-success">Save</button>
            <button wire:click="$toggle('isEditing')" class="btn btn-sm btn-default">Cancel</button>
        </div>
        @else
        <button wire:click="$toggle('isEditing')" class="btn btn-sm btn-info">Edit</button>
        <span>
            Created: {{ $quote->created_at->diffForHumans() }}
        </span>
        <button wire:click="deleteQuote" class="btn btn-sm btn-danger">Delete</button>
        @endif
    </div>
</div>
