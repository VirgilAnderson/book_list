<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curr_user_id = auth()->user()->id;
        $books = DB::table('books')->get()->where('creator_id', $curr_user_id);

        return view('books.index')
            ->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curr_user_id = auth()->user()->id;
        return view('books.create')
            ->with('curr_user_id', $curr_user_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('books')->insertGetId([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'pages' => $request->input('pages'),
            'genre' => $request->input('genre'),
            'publisher' => $request->input('publisher'),
            'description' => $request->input('description'),
            'creator_id' => $request->input('creator_id'),
            'sort_order' => 1,
        ]);
        return redirect()->action('BookController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show')
            ->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $curr_user_id = auth()->user()->id;
        return view('books.edit')
            ->with('book', $book)
            ->with('curr_user_id', $curr_user_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
