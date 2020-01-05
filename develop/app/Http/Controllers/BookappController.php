<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;


class BookappController extends Controller
{
    public function index () { 
        $books = Book::all();
        return view('books', ['books' => $books ]);
    }

    public function create (Request $request) {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        $book = new Book;
        $book->title = $request->name;
        $book->save();
     
        return redirect('/');
    }

    public function delete (book $book){
        $book->delete();
   
        return redirect('/');
    }
}
