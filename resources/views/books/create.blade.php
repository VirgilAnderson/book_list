@extends('layouts.app')

@section('content')
<div class="col">
<form action="{{ route('books.store') }}" method="POST">
    <legend>Add a book to you want to read!</legend>

    <input type="hidden" name="creator_id" value="{{ $curr_user_id }}"/>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"for="title">Title</label>
        <div class="col-sm-10">
            <input name="title" type="text" class="form-control" placeholder="Book Title"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"for="author">Author</label>
        <div class="col-sm-10">
            <input name="author" type="text" class="form-control" placeholder="Book Author"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"for="pages">Pages</label>
        <div class="col-sm-10">
            <input name="pages" type="text" class="form-control" placeholder="Number of pages"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"for="genre">Genre</label>
        <div class="col-sm-10">
            <input name="genre" type="text" class="form-control" placeholder="Book Genre"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"for="publisher">Publisher</label>
        <div class="col-sm-10">
            <input name="publisher" type="text" class="form-control" placeholder="Book publisher"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"for="description">Description</label>
        <div class="col-sm-10">
            <textarea name="description" class="form-control" placeholder="Book Description"></textarea>
        </div>
    </div>

    @csrf

    <div class="form-group row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Add Book</button>
        </div>
        <div class="col-sm-9">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
</div>
@endsection
