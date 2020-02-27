@extends('layouts.app')

@section('content')
    <section class="text-white">
        <h1>Welcome To Book List App</h1>
        <h2>Register to create a list of books to read</h2>
        <div class="btn-group">
          <a href="{{ route('register') }}"type="button" class="btn btn-primary">Register</a>
          <a href="{{ route('login') }}" type="button" class="btn btn-primary">Login</a>
        </div>
    </section>
@endsection
