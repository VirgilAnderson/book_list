@extends('layouts.app')

@section('title')
    <div>
        <h1>{{ $book->title }}</h1>
       </div>
@endsection

@section('content')
<dl class="row">
    <dt class="col-sm-3">Title</dt>
    <dd class="col-sm-9">{{ $book->title }}</dd>

    <dt class="col-sm-3">Author</dt>
    <dd class="col-sm-9">{{ $book->author }}</dd>

    <dt class="col-sm-3">Pages</dt>
    <dd class="col-sm-9">{{ $book->pages }}</dd>

    <dt class="col-sm-3">Genre</dt>
    <dd class="col-sm-9">{{ $book->genre }}</dd>

    <dt class="col-sm-3">Publisher</dt>
    <dd class="col-sm-9">{{ $book->publisher }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $book->description }}</dd>

</dl>

<form name="{{ $book->id }}" action="{{ action('BookController@destroy', ['book' => $book->id]) }}" method="POST">
    @method('DELETE')
    @csrf
</form>
@endsection

@section('controls')
    <a class="btn btn-outline-primary btn-sm" href="{{ route('books.index') }}" role="button">&laquo; Return to list</a>

    <a class="btn btn-outline-primary btn-sm" href="{{ action('BookController@edit', ['book' => $book->id]) }}" role="button">Edit</a>

    <a class="delete btn btn-outline-primary btn-sm" href="#" id="{{ $book->id }}" role="button">Delete</a>

@endsection

