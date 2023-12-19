@extends('default')

@push('scss')
    @vite(['resources/scss/blog/posts/list.scss'])
@endpush

@push('title')
    <title>Hayate Tech Hub</title>
@endpush

@push('meta_description')
    <meta name="description" content="Hayate Tech Hubへようこそ。Hayate Tech Hubは、私がこれまで開発したアプリや使用した技術をシェアする場所です。テクノロジーを共に学び、共に成長しましょう。">
@endpush

@section('content')
    <div class="article-area">
        <h2>Articles</h2>

        <div class="blog-container">
            @foreach ($blogs as $blog)
                @include('layouts.parts.cardComponent', ['blog' => $blog])
            @endforeach
        </div>

        {{ $blogs->links('layouts.parts.paginationComponent') }}
    </div>
@endsection
