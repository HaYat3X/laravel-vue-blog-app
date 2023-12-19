@extends('admin')

@push('scss')
    @vite(['resources/scss/admin/sessions/new.scss'])
@endpush

@section('content')
    <div class="login-area">
        <form method="POST" action="{{ route('adminSessionStore') }}" class="needs-validation" novalidate>
            @csrf
            @method('POST')

            <div class="mb-4">
                <label for="validationCustom01" class="form-label">メールアドレス</label>
                <input type="email" name="email" class="form-control"
                    id="validationCustom01" required>

                <div class="invalid-feedback">
                    メールアドレスを入力してください。
                </div>
            </div>

            <div class="mb-4">
                <label for="validationCustom02" class="form-label">パスワード</label>
                <input style="height: 45px;" type="password" name="password" class="form-control" id="validationCustom02"
                    required>

                <div class="invalid-feedback">
                    パスワードを入力してください。
                </div>
            </div>

            <button type="submit" class="btn btn-primary">ログイン</button>
        </form>
    </div>
@endsection
