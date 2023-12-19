@extends('admin')

@push('scss')
    @vite(['resources/scss/admin/posts/list.scss'])
@endpush

@section('content')
    <div class="article-area">
        <h2>Articles</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th scope="col">Title</th>
                    <th scope="col">PublicStatus</th>
                    <th scope="col">-</th>
                    <th scope="col">-</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                @foreach ($blogs as $blog)
                    <tr>
                        <th>{{ $blog->id }}</th>

                        <td>{{ $blog->title }}</td>

                        <td>
                            @if ($blog->public_status == 0)
                                false
                            @else
                                true
                            @endif
                        </td>

                        <td>
                            <a class="btn btn-success" href="{{ route('adminBlogEdit', ['blog_id' => $blog->id]) }}">edit</a>
                        </td>

                        <td>
                            <form action="{{ route('adminBlogDestroy', ['blog_id' => $blog->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
