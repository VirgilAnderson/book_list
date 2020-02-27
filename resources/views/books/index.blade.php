@extends('layouts.app')

@section('title')
    <div class="text-white mt-5">
        <h1>My Booklist</h1>
        <h2><small>Books I'd like to read</small></h2>
    </div>
@endsection

@section('buttons')
    <a class="btn btn-primary btn-sm" href="{{ route('books.create') }}" role="button">Add New Book</a>
@endsection

@section('content')
    <table class='table table-light table-striped'>
        <thead class="thead-light">
            <tr>
                <th>
                    @if($sort == 'sort_order')
                        @switch($dir)
                            @case('asc')
                                <a href="{{ url('books/sorted/sort_order/desc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                                    <small>&#9650;</small> Order
                                </a>
                                @break

                            @case('desc')
                                <a href="{{ url('books/sorted/sort_order/asc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                                    <small>&#9660;</small> Order
                                </a>
                                @break

                            @default
                                // Do nothing
                        @endswitch
                    @else
                        <a href="{{ url('books/sorted/sort_order/asc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                            Order
                        </a>
                    @endif
                </th>
                <th>
                    @if($sort == 'title')
                        @switch($dir)
                            @case('asc')
                                <a href="{{ url('books/sorted/title/desc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                                    <small>&#9650;</small> Title
                                </a>
                                @break

                            @case('desc')
                                <a href="{{ url('books/sorted/title/asc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                                    <small>&#9660;</small> Title
                                </a>
                                @break

                            @default
                                // Do nothing
                        @endswitch
                    @else
                        <a href="{{ url('books/sorted/title/asc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                            Title
                        </a>
                    @endif

                </th>
                <th>
                    @if($sort == 'author')
                        @switch($dir)
                            @case('asc')
                                <a href="{{ url('books/sorted/author/desc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                                    <small>&#9650;</small> Author
                                </a>
                                @break

                            @case('desc')
                                <a href="{{ url('books/sorted/author/asc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                                    <small>&#9660;</small> Author
                                </a>
                                @break

                            @default
                                // Do nothing
                        @endswitch
                    @else
                        <a href="{{ url('books/sorted/author/asc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                            Author
                        </a>
                    @endif

                </th>
                <th>
                    @if($sort == 'genre')
                        @switch($dir)
                            @case('asc')
                                <a href="{{ url('books/sorted/genre/desc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                                    <small>&#9650;</small> Genre
                                </a>
                                @break

                            @case('desc')
                                <a href="{{ url('books/sorted/genre/asc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                                    <small>&#9660;</small> Genre
                                </a>
                                @break

                            @default
                                // Do nothing
                        @endswitch
                    @else
                        <a href="{{ url('books/sorted/genre/asc') }}{{ $page > 1 ? '?page='.$page : '' }}">
                            Genre
                        </a>
                    @endif

                </th>
                <th class="Actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr id="{{ $book->id }}">
                    <td>
                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-outline-secondary btn-sm controls up"><small>&#9650;</small></button>
                            <button type="button" class="btn btn-outline-secondary btn-sm controls down"><small>&#9660;</small></button>
                        </div>
                        <form name="swap_{{ $book->id }}" action="{{ action('BookController@swap') }}" method="GET">

                            <input type="hidden" name="id_1" value="{{ $book->id }}">
                            <input id="input_{{ $book->id }}"type="hidden" name="id_2">
                            @csrf
                        </form>
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>

                        <div class="btn-group btn-group-small">
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
