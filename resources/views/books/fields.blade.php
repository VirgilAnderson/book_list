@if ($errors->any())
    @foreach($errors->all() as $error)
        <p class="alert alert-danger">
            {{ $error }}
        </p>
    @endforeach
@endif
<input type="hidden" name="creator_id" value="{{ $curr_user_id }}"/>
<input type="hidden" name="sort_order" value="{{ $book->sort_order ?? $sort_order }}"/>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"for="title">Title</label>
    <div class="col-sm-10">
        <input name="title" type="text" class="form-control" placeholder="Book Title" value="{{ $book->title ?? ''}}"/>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"for="author">Author</label>
    <div class="col-sm-10">
        <input name="author" type="text" class="form-control" placeholder="Book Author" value="{{ $book->author ?? ''}}"/>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"for="pages">Pages</label>
    <div class="col-sm-10">
        <input name="pages" type="text" class="form-control" placeholder="Number of pages" value="{{ $book->pages ?? ''}}"/>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"for="genre">Genre</label>
    <div class="col-sm-10">
        <input name="genre" type="text" class="form-control" placeholder="Book Genre" value="{{ $book->genre ?? ''}}"/>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"for="publisher">Publisher</label>
    <div class="col-sm-10">
        <input name="publisher" type="text" class="form-control" placeholder="Book publisher" value="{{ $book->publisher ?? ''}}"/>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"for="description">Description</label>
    <div class="col-sm-10">
        <textarea name="description" class="form-control" placeholder="Book Description">{{ $book->description ?? ''}}</textarea>
    </div>
</div>

@csrf
