@extends('default')

@push('scss')
    @vite(['resources/scss/blog/search/search.scss'])
@endpush

@push('title')
    <title>Hayate Tech Hub / 記事を検索する</title>
@endpush

@push('meta_description')
    <meta name="description" content="">
@endpush

@section('content')
    <div class="search-area">
        <div class="search_keyword_container">
            <form method="GET" action="{{ route('blogSearchShow') }}">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="bi bi-search"></i>
                    </span>

                    <input type="text" name="k" required class="form-control" placeholder="キーワードを入力..."
                        aria-label="..." aria-describedby="button-addon2" required>
                </div>
            </form>
        </div>

        <div class="search_tag_container">
            <h5 for="">タグ一覧</h5>

            @foreach ($tags as $tag)
                <a href="{{ route('blogSearchShow', ['t' => $tag->tag]) }}">
                    # {{ $tag->tag }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
