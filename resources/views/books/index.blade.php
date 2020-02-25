@extends('layouts.app')

@section('title')
    <div>
        <h1>My Booklist</h1>
        <h2><small>Books I'd like to read</small></h2>
    </div>
@endsection

@section('buttons')
    <a class="btn btn-outline-primary btn-sm" href="{{ route('books.create') }}" role="button">Add New Book</a>
@endsection

@section('content')
    <table class='table'>
        <thead>
            <tr>
                <th>
                    Title
                </th>
                <th>
                    Author
                </th>
                <th>
                    Genre
                </th>
                <th>
                    Publisher
                </th>
                <th class="Actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->publisher}}</td>
                    <td>
                        <a
                            href="{{ action('BookController@show', ['book' => $book->id]) }}"
                            alt="View"
                            title="View">
                          View
                        </a>

                        <a
                            href="{{ action('BookController@edit', ['book' => $book->id]) }}"
                            alt="edit"
                            title="edit">
                          Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
