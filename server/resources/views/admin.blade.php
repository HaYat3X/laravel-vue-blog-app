<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>管理者ページ</title>

    {{-- ファビコン --}}

    {{-- フォントの導入 --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- Bootstrap5の導入 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    {{-- Bootstrap iconの導入 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- SCSS --}}
    @vite(['resources/scss/admin.scss'])
    @stack('scss')

    {{-- easyMDE --}}
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
</head>

<body>
    <div class="wrapper">
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

        <main>
            <div class="side-area">
                <div class="side-container">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('adminBlogIndex') }}" class="nav-link" aria-current="page">
                                <i class="bi bi-speedometer2"></i>
                                Article
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('adminBlogCreate') }}" class="nav-link" aria-current="page">
                                <i class="bi bi-pen"></i>
                                New Post
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('adminContactIndex') }}" class="nav-link" aria-current="page">
                                <i class="bi bi-person-rolodex"></i>
                                Contact
                            </a>
                        </li>

                        <li class="nav-item">
                            <form action="{{ route('adminSessionDestroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="nav-link">
                                    <i class="bi bi-door-open"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="content-area">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- JQueryの読み込み --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    {{-- Bootstrap5の導入 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        // 5秒後にフラッシュメッセージを非表示にする
        setTimeout(function() {
            $('.flash-msg').slideUp();
        }, 5000);

        // 下書き保存 / 公開切り替え
        $(window).on('load', function() {
            $('#iphoneSwitch').change(function() {
                if ($(this).is(':checked')) {
                    $('#submitButton').text('公開する');
                } else {
                    $('#submitButton').text('下書き保存');
                }
            });
        });

        // markdownエディタ
        const easyMDE = new EasyMDE({
            maxHeight: "300px",
            element: document.getElementById('content')
        });

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
