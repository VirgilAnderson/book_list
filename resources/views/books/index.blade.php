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
                    @if($sort == 'title')
                        @switch($dir)
                            @case('asc')
                                <a href="{{ url('books/sorted/title/desc?page=') }}{{ $page }}">
                                    &#9650; Title
                                </a>
                                @break

                            @case('desc')
                                <a href="{{ url('books/sorted/title/asc?page=') }}{{ $page }}">
                                    &#9660; Title
                                </a>
                                @break

                            @default
                                // Do nothing
                        @endswitch
                    @else
                        <a href="{{ url('books/sorted/title/asc?page=') }}{{ $page }}">
                            Title
                        </a>
                    @endif

                </th>
                <th>
                    @if($sort == 'author')
                        @switch($dir)
                            @case('asc')
                                <a href="{{ url('books/sorted/author/desc?page=') }}{{ $page }}">
                                    &#9650; Author
                                </a>
                                @break

                            @case('desc')
                                <a href="{{ url('books/sorted/author/asc?page=') }}{{ $page }}">
                                    &#9660; Author
                                </a>
                                @break

                            @default
                                // Do nothing
                        @endswitch
                    @else
                        <a href="{{ url('books/sorted/author/asc?page=') }}{{ $page }}">
                            Author
                        </a>
                    @endif

                </th>
                <th>
                    @if($sort == 'genre')
                        @switch($dir)
                            @case('asc')
                                <a href="{{ url('books/sorted/genre/desc?page=') }}{{ $page }}">
                                    &#9650; Genre
                                </a>
                                @break

                            @case('desc')
                                <a href="{{ url('books/sorted/genre/asc?page=') }}{{ $page }}">
                                    &#9660; Genre
                                </a>
                                @break

                            @default
                                // Do nothing
                        @endswitch
                    @else
                        <a href="{{ url('books/sorted/genre/asc?page=') }}{{ $page }}">
                            Genre
                        </a>
                    @endif

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
                    <td>

                        <div class="btn-group btn-group-small ">
                            <a class="btn btn-outline-primary btn-sm" href="{{ action('BookController@show', ['book' => $book->id]) }}" role="button">View</a>
                            <a class="btn btn-outline-primary btn-sm" href="{{ action('BookController@edit', ['book' => $book->id]) }}" role="button">Edit</a>
                            <a class="delete btn btn-outline-primary btn-sm" href="#" id="{{ $book->id }}" role="button">Delete</a>

                        </div>

                        <form name="{{ $book->id }}" action="{{ action('BookController@destroy', ['book' => $book->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links() }}
@endsection
