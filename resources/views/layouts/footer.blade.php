<footer class="footer footer-black  footer-white ">
    <div class="container-fluid">
        <div class="row">
            <nav class="footer-nav">
                <ul>

                </ul>
            </nav>
            <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>{{ __(', UI theme made with ') }}<i class="fa fa-heart heart"></i>{{ __(' by ') }}<a class="@if(Auth::guest()) text-white @endif" href="https://www.creative-tim.com" target="_blank">{{ __('Creative Tim') }}</a>{{ __(' and ') }}<a class="@if(Auth::guest()) text-white @endif" target="_blank" href="https://updivision.com">{{ __('UPDIVISION') }}</a>
                </span>
            </div>
        </div>
    </div>
</footer>
