<div class="content">
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row d-flex">
                            <div class="col-2 h-100" style="min-height: 192px; min-width: 128px;">
                                <img
                                    src="{{ $book->thumbnail }}"
                                    class="img-responsive"
                                    style="min-height: 192px; min-width: 128px;"
                                >
                            </div>
                            <div class="col-10 mt-2">
                                <p class="font-weight-bold">{{ $book->title }}</p>
                                <p>{{ $book->description}}</p>
                                <ul class="list-unstyled">
                                    <li>Author: {{ $book->author }}</li>
                                    <li>Published: {{ $book->publishedDate }}</li>
                                    <li>Pages: {{ $book->pageCount }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="300" cols="50"></textarea>
                <small class="form-text text-muted text-center">Quote Text</small>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group">
                <input class="form-control text-center" placeholder="On Page">
                <small class="form-text text-muted text-center">(optional)</small>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <button class="btn btn-block btn-success">Add Quote</button>
            </div>
        </div>
    </div>
</div>
