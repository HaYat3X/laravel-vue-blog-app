@extends('default')

@push('scss')
    @vite(['resources/scss/blog/contacts/new.scss'])
@endpush

@push('title')
    <title>Hayate Tech Hub / お問い合わせ</title>
@endpush

@push('meta_description')
    <meta name="description" content="">
@endpush

@section('content')
    <div class="contact-area">
        <h2>Contact</h2>

        <div class="contact-container">
            <form method="POST" action="{{ route('blogContactStore') }}" class="needs-validation" novalidate>
                @method('POST')
                @csrf

                <div class="mb-4 col-lg-6">
                    <label for="exampleFormControlInput1" class="form-label">名前（フルネーム）</label>

                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                        placeholder="竹田 颯" required>

                    <div class="invalid-feedback">
                        名前を入力してください。
                    </div>
                </div>

                <div class="mb-4 col-lg-6">
                    <label for="exampleFormControlInput1" class="form-label">メールアドレス</label>

                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="example@example.com" required>

                    <div class="invalid-feedback">
                        メールアドレスを入力してください。
                    </div>
                </div>

                <div class="mb-4 col-lg-6">
                    <label for="exampleFormSelect1" class="form-label">お問い合わせカテゴリー</label>

                    <select class="form-select" id="validationCustom04" name="category" required>
                        <option selected disabled value="">選択...</option>
                        <option value="その他">その他</option>
                    </select>

                    <div class="invalid-feedback">
                        お問い合わせカテゴリーを選択してください。
                    </div>
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label">お問い合わせ内容</label>

                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>

                    <div class="invalid-feedback">
                        お問い合わせ内容を選択してください。
                    </div>
                </div>

                <button type="submit" class="btn">送信</button>
            </form>
        </div>
    </div>
@endsection
