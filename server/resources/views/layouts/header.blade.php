<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('blogPostIndex') }}">
            <img src="{{ asset('img/logo.png') }}" alt="ロゴ">
        </a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">私について</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">このサイトについて</a>
            </li>

            <li class="nav-item">
                <a class="btn search-btn" href="{{route('blogSearchIndex')}}">
                    <i class="bi bi-search"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="contact-btn btn" href="{{ route('blogContactCreate') }}">お問い合わせ</a>
            </li>
        </ul>
    </div>
</nav>
