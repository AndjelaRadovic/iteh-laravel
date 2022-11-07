<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookTestController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return $books;
    }

    public function show(Book $book)
    {
         return new BookResource($book);
    }

}
