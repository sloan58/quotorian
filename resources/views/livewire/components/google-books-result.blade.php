<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 mb-2 h-100 d-flex justify-content-center">
    <img
        src="{{ $googleBook['volumeInfo']['imageLinks']['thumbnail'] }}"
        class="img-responsive"
        wire:click="addToBookshelf"
        style="cursor: pointer;"
    >
</div>
