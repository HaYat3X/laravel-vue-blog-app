@extends('admin')

@push('scss')
    @vite(['resources/scss/admin/posts/edit.scss'])
@endpush

@section('content')
    <div class="article-edit-area">
        <h2>Edit Article</h2>

        <form action="{{ route('adminBlogUpdate', ['blog_id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="col-lg-6 mb-4">
                <label for="validationCustom02" class="form-label">記事タイトル</label>
                <input type="text" name="title" class="form-control" id="validationCustom02" value="{{ $blog->title }}"
                    required>

                <div class="invalid-feedback">
                    記事タイトルを入力してください。
                </div>
            </div>

            <div class="col-lg-12 mb-4">
                <label for="validationCustom02" class="form-label">記事本文</label>
                <textarea name="content" id="content" placeholder="content" required>{{ $blog->content }}</textarea>
                <div class="invalid-feedback">
                    記事本文を入力してください。
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <label for="formFile" class="form-label">サムネイル画像</label>
                <input type="file" name="featured_image" class="form-control" id="formFile"
                    value="{{ $blog->featured_image }}">
            </div>

            <div class="col-lg-6 mb-4">
                <label for="validationCustom02" class="form-label">記事説明</label>
                <textarea class="form-control" name="meta_description" placeholder="meta_description" rows="3" required>
                    {{ $blog->meta_description }}
                </textarea>

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
