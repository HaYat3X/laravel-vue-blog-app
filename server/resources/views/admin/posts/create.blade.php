@extends('admin')

@push('scss')
    @vite(['resources/scss/admin/posts/new.scss'])
@endpush

@section('content')
    <div class="article-new-area">
        <h2>New Article</h2>
        <form class="needs-validation" action="{{ route('adminBlogStore') }}" method="POST" enctype="multipart/form-data"
            novalidate>
            @csrf
            @method('POST')

            <div class="col-lg-6 mb-4">
                <label for="validationCustom02" class="form-label">記事タイトル</label>
                <input type="text" name="title" class="form-control" id="validationCustom02" required>

                <div class="invalid-feedback">
                    記事タイトルを入力してください。
                </div>
            </div>

            <div class="col-lg-12 mb-4">
                <label for="validationCustom02" class="form-label">記事本文</label>
                <textarea name="content" id="content" placeholder="Markdown in Wirte..." required></textarea>
                <div class="invalid-feedback">
                    記事本文を入力してください。
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <label for="formFile" class="form-label">サムネイル画像</label>
                <input type="file" name="featured_image" class="form-control" id="formFile" required>

                <div class="invalid-feedback">
                    サムネイル画像を入力してください。
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <label for="validationCustom02" class="form-label">記事説明</label>
                <textarea class="form-control" name="meta_description" placeholder="meta_description" rows="3" required></textarea>

                <div class="invalid-feedback">
                    記事の説明を入力してください。
                </div>
            </div>

            <div class="d-flex align-items-center">
                <div class="iphone-switch">
                    <input type="checkbox" name="public_status" value=1 id="iphoneSwitch">
                    <label class="iphone-slider" for="iphoneSwitch"></label>
                </div>

                <span class="me-2">公開する</span>

                <button type="submit" class="btn btn-primary" id="submitButton">
                    公開する
                </button>
            </div>
        </form>
    </div>
@endsection
