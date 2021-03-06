@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome Back</h1>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><a href="{{ route('books.index') }}">View Book List</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
