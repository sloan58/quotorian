<div class="content">
    <div class="container ml-0">
        <div class="row justify-content-start">
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
    </div>
</div>
