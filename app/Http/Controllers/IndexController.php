<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $crime_books = Book::where('category_2_id', 12)
            ->orderBy('publication_date', 'desc')
            ->limit(10)
            ->get();

        $crime_books->loadMissing([
            'authors',
            'publishers'
        ]);

        return view('index.index', compact(
            'crime_books'
        ));
    }

    /**
     * creates a Rating for a book
     */
    public function rateBook(Request $request, $book_id)
    {
        // validation

        $rating = new Rating;
        $rating->book_id = $book_id;
        $rating->user_id = Auth::user()->id;
        $rating->value = $request->post('value');

        $rating->save();

        // flash success message

        // redirect
    }
}
