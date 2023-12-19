@extends('default')

@push('scss')
    @vite(['resources/scss/blog/search/searchResult.scss'])
@endpush

@push('title')
    <title>Hayate Tech Hub / 記事を検索する</title>
@endpush

@push('meta_description')
    <meta name="description" content="">
@endpush

@section('content')
    <div class="article-area">
        <h2>
            @if ($search_keyword)
                {{ $search_keyword }}
            @elseif ($search_tag)
                {{ $search_tag }}
            @endif
            の検索結果
        </h2>

        <div class="blog-container">
            @if ($blogs->isEmpty())
                <p class="mb-0">
                    条件に当てはまる記事が見つかりませんでした。<br>
                    検索条件を変えて検索してみてください。
                </p>
            @else
                @foreach ($blogs as $blog)
                    @include('layouts.parts.cardComponent', ['blog' => $blog])
                @endforeach
            @endif
        </div>

        {{ $blogs->links('layouts.parts.paginationComponent') }}
    </div>
@endsection
