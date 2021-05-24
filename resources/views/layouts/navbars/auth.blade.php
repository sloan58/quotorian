<div class="sidebar" data-color="black" data-active-color="danger">
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="/" class="simple-text logo-normal">
            {{ env('APP_NAME', 'Laravel') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('home', 'dashboard') }}">
                    <i class="fa fa-book"></i>
                    <p>{{ __('My Books') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'search' ? 'active' : '' }}">
                <a href="{{ route('search') }}">
                    <i class="fa fa-search"></i>
                    <p>{{ __('Search Books') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'quotorians' ? 'active' : '' }}">
                <a href="{{ route('quotorians') }}">
                    <i class="fa fa-users"></i>
                    <p>{{ __('Quotorians') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
