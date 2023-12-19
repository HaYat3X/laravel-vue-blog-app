@extends('default')

@push('scss')
    @vite(['resources/scss/blog/posts/show.scss'])
    <link rel="stylesheet" href="{{ asset('css/atom-one-dark.min.css') }}">
    <script src="{{ asset('js/highlight.min.js') }}"></script>
@endpush

@push('title')
    <title>{{ $blog->meta_title }}</title>
@endpush

@push('meta_description')
    <meta name="description" content="{{ $blog->meta_description }}">
@endpush

@section('content')
    <div class="article-area">
        <div class="title-container">
            <img src="{{ asset('storage/featured_image/' . $blog->featured_image) }}" alt="画像の説明">

            <h2 class="text-center">{{ $blog->title }}</h2>

            <p class="text-center">
                {{ \Carbon\Carbon::parse($blog->created_at)->format('Y/m/d') }}に公開
            </p>
        </div>

        <div class="blog-container">
            <label for="" class="badge rounded-pill">
                @foreach ($blog->tags as $tag)
                    {{ $tag->tag }}
                @endforeach
            </label>

            {{ $htmlContent }}
        </div>
    </div>
@endsection
