<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;    

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return new BookCollection($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'number_of_pages' => 'required|numeric',
            'year_of_release' => 'required|numeric',
            'author_id' => 'required',
            'genre_id' => 'required',
           
        ]);

        if($validator->fails())
            return response()->json($validator->errors());

        $book=Book::create([
            'title' => $request->title,
            'number_of_pages' => $request->number_of_pages,
            'year_of_release' => $request->year_of_release,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
            'user_id' => Auth::user()->id
        ]);    

        return response()->json(['Book is created successfully.', new BookResource($book)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'number_of_pages' => 'required|numeric',
            'year_of_release' => 'required|numeric',
            'author_id' => 'required',
            'genre_id' => 'required'
            
        ]);

        if($validator->fails())
            return response()->json($validator->errors());


        $book -> title = $request -> title;
        $book -> number_of_pages = $request -> number_of_pages;
        $book -> year_of_release = $request -> year_of_release;
        $book -> author_id = $request -> author_id;
        $book -> genre_id = $request -> genre_id;

        $book -> save();

        return response()->json(['Book is updated successfully.', new BookResource($book)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book -> delete();

        return response()->json('Book is deleted successfully.');
    }
}
