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
    public function index(Request $request, $sorted = null, $sort = 'sort_order', $dir = 'desc')
    {
        $curr_user_id = auth()->user()->id;
        $columns = array('title', 'author', 'genre', 'sort_order');
        if (isset($sort) && in_array($sort, $columns)) {
            $books = Book::where('creator_id', $curr_user_id)
                ->orderBy($sort, $dir)
                ->paginate(5);
        } else {
            $books = Book::where('creator_id', $curr_user_id)
                ->paginate(5);
        }

        $page = $books->currentPage();

        return view('books.index')
            ->with('books', $books)
            ->with('sort', $sort)
            ->with('dir', $dir)
            ->with('page', $page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curr_user_id = auth()->user()->id;
        $max_sort = Book::where('creator_id', $curr_user_id)->max('sort_order');

        return view('books.create')
            ->with('curr_user_id', $curr_user_id)
            ->with('sort_order', ++$max_sort);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'present',
            'pages' => 'present',
            'genre' => 'present',
            'publisher' => 'present',
            'description' => 'present',
            'creator_id' => 'required|exists:users,id',
            'sort_order' => 'required',
        ]);

        $id = Book::create($validatedData);
        return redirect()->action('BookController@show', $id);
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
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'present',
            'pages' => 'present',
            'genre' => 'present',
            'publisher' => 'present',
            'description' => 'present',
            'creator_id' => 'required|exists:users,id',
            'sort_order' => 'required',
        ]);

        $book->fill($validatedData);
        $book->save();
        return redirect()->action('BookController@show', $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        DB::table('books')->where('id', $book->id)->delete();
        return redirect()->action('BookController@index');
    }

    public function swap(Request $request)
    {
        $curr_user_id = auth()->user()->id;

        $sort = Book::select('sort_order', 'id')
            ->where([
                    ['creator_id', '=', $curr_user_id]
                ])
            ->whereIn('id', [$request->input()["id_1"], $request->input()["id_2"]])
            ->pluck('sort_order', 'id');

        DB::table('books')
            ->where('id', $request->input()["id_1"])
            ->update(['sort_order' => $sort[$request->input()["id_2"]]]);

        DB::table('books')
            ->where('id', $request->input()["id_2"])
            ->update(['sort_order' => $sort[$request->input()["id_1"]]]);

        return redirect()->action('BookController@index');
    }
}
