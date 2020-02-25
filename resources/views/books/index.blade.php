@extends('layouts.app')

@section('buttons')
    <!-- <a class="btn btn-outline-primary btn-sm" href="{{ route('books.create') }}" role="button">Add New Book</a> -->
@endsection

@section('content')
    <div>
        <h1>My Booklist</h1>
        <h2><small>Books I'd like to read</small></h2>
    </div>
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
                <th></th>
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

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
