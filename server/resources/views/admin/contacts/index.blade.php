@extends('admin')

@push('scss')
    @vite(['resources/scss/admin/contacts/list.scss'])
@endpush

@section('content')
    <div class="article-area">
        <h2>Contacts</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Category</th>
                    <th scope="col">Content</th>
                    <th scope="col">-</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                @foreach ($contacts as $contact)
                    <tr>
                        <th>{{ $contact->id }}</th>

                        <td>{{ $contact->name }}</td>

                        <td>{{ $contact->email }}</td>

                        <td>{{ $contact->category }}</td>

                        <td>{{ $contact->content }}</td>

                        <td>
                            <form action="{{ route('adminContactDestroy', ['contact_id' => $contact->id]) }}"
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
