@extends('layouts.app')

@section('content')
<div class="col">
<form action="{{ route('books.update', ['book' => $book]) }}" method="POST">
    @method('PUT')
    <legend>Edit: {{$book->title}}</legend>
    @include('books.fields')

    <div class="form-group row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Edit Book</button>
        </div>
        <div class="col-sm-9">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
</div>
@endsection
