@extends('layouts.app')

@section('content')
<div class="card mb-5">
  <div class="card-header"><h1>Details: {{ $book->title }}</h1></div>
  <div class="card-body">
    <dl class="row">
        <dt class="col-sm-2"><em>Title</em></dt>
        <dd class="col-sm-10">{{ $book->title }}</dd>

        <dt class="col-sm-2"><em>Author</em></dt>
        <dd class="col-sm-10">{{ $book->author }}</dd>

        <dt class="col-sm-2"><em>Pages</em></dt>
        <dd class="col-sm-10">{{ $book->pages }}</dd>

        <dt class="col-sm-2"><em>Genre</em></dt>
        <dd class="col-sm-10">{{ $book->genre }}</dd>

        <dt class="col-sm-2"><em>Publisher</em></dt>
        <dd class="col-sm-10">{{ $book->publisher }}</dd>

        <dt class="col-sm-2"><em>Description</em></dt>
        <dd class="col-sm-10">{{ $book->description }}</dd>

    </dl>
  </div>
  <div class="card-footer">
    <div class="container">
        <div class="row btn-group">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('books.index') }}" role="button">&laquo; Return to list</a>

            <a class="btn btn-outline-primary btn-sm" href="{{ action('BookController@edit', ['book' => $book->id]) }}" role="button">Edit</a>

            <a class="delete btn btn-outline-primary btn-sm" href="#" id="{{ $book->id }}" role="button">Delete</a>
        </div>
    </div>

  </div>
</div>


<form name="{{ $book->id }}" action="{{ action('BookController@destroy', ['book' => $book->id]) }}" method="POST">
    @method('DELETE')
    @csrf
</form>
@endsection

@section('controls')


@endsection

