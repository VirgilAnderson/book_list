@extends('layouts.app')

@section('content')
<div class="col">
<form action="{{ route('books.update', ['book' => $book]) }}" method="POST">
    @method('PUT')


    <div class="card m0">
      <div class="card-header"><legend>Edit: {{$book->title}}</legend></div>
      <div class="card-body">@include('books.fields')</div>
      <div class="card-footer">
        <div class="form-group row">
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary">Edit Book</button>
            </div>
            <div class="col-sm-9">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
      </div>
    </div>

</form>
</div>
@endsection
