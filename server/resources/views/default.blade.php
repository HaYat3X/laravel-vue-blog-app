<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO対策 --}}
    @stack('title')
    @stack('meta_description')

    {{-- ファビコン --}}

    {{-- フォントの導入 --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- Bootstrap5の導入 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    {{-- Bootstrap iconの導入 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- highlight.jsの導入 --}}
    <link rel="stylesheet" href="{{ asset('css/atom-one-dark.min.css') }}">
    <script src="{{ asset('js/highlight.min.js') }}"></script>

    {{-- SCSS --}}
    @vite(['resources/scss/default.scss'])
    @stack('scss')

    {{-- JS --}}
    @vite(['resources/js/tooltip.js'])
</head>

<body>
    <div class="wrapper">
        <header>
            @include('layouts.header')
        </header>

        @if (Session::has('alert') || Session::has('notice'))
            <div class="flash-msg">
                @if (Session::has('alert'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ session('alert') }}
                    </div>
                @endif

                @if (Session::has('notice'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('notice') }}
                    </div>
                @endif
            </div>
        @endif

        <main>
            <div class="content-area">
                @yield('content')
            </div>

            <div class="side-area">
                @include('layouts.sidebar')
            </div>
        </main>

        <footer>
            @include('layouts.footer')
        </footer>
    </div>

    {{-- JQueryの読み込み --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    {{-- Bootstrap5の読み込み --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        // 5秒後にフラッシュメッセージを非表示にする
        setTimeout(function() {
            $('.flash-msg').slideUp();
        }, 5000);

        // highlight.jsの有効化
        hljs.highlightAll();

        // 無効なフィールドがある場合にフォーム送信を無効にするスターターJavaScriptの例
        (() => {
            'use strict'

            // Bootstrapカスタム検証スタイルを適用してすべてのフォームを取得
            const forms = document.querySelectorAll('.needs-validation')

            // ループして帰順を防ぐ
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>
