<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'desc')
            ->limit(20)
            ->get();

        return view('admin.books.index', compact(
            'books'
        ));
    }

    /**
     * displays a form to edit an existing book
     */
    public function edit($book_id)
    {
        $book = Book::findOrFail($book_id);

        return view('admin.books.edit', compact(
            'book'
        ));
    }
}
