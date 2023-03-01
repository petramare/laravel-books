@extends('layouts.admin')

@section('content')

<h1>Books</h1>

<table class="admin-table">
    <thead>
        <tr>
            <th>#ID</th>
            <th>Title</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>
                    {{ $book->id }}
                </td>
                <td>
                    {{ $book->title }}
                </td>
                <td>
                    <a href="{{ route('admin.books.edit', $book->id)}}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection