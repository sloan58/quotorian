<div class="content">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6 col-sm-12">
                <input
                    wire:model.debounce.500ms="term"
                    class="form-control text-center"
                    type="search"
                    placeholder="Search For Fellow Quotorians..."
                    value="{{ $term }}"
                    aria-label="Search">
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <h4>Want to share your books and quotes with your friends?  Connect with them here!</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="list-group">
                    @foreach($availableQuotorians as $availableQuotorian)
                        @if($availableQuotorian->id !== auth()->user()->id)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-primary btn-fab btn-icon btn-round mr-1">
                                    <i class="fa fa-plus"></i>
                                </button>
                                {{ $availableQuotorian->name }} ({{ $availableQuotorian->email }})
                            </div>
                            <img class="avatar border-gray" src="{{ Gravatar::get($availableQuotorian->email, ['size'=> 50]) }}" alt="...">
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row text-center text-danger font-weight-bold mt-5">
            <div class="col-12">
                <p>This feature is still in development...</p>
            </div>
        </div>
    </div>
</div>
