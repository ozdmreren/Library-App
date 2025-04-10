<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books.index',[
            "books"=>$books
        ]);
    }

    public function show(Book $book){
        return view('books.show',[
            "book"=>$book
        ]);
    }

    public function create(){
        return view("books.create");
    }

    public function store(Request $request){

        $request->validate([
            "name"=>["required"],
            "author"=>["required"],
            "content"=>["required","min:100"],
            "image"=>["required"],
            "mostLike"=>"0",
            "like"=>"0",
            "dislike"=>"0"
        ]);

        Book::create([
            "name"=>$request->get("name"),
            "author"=>$request->get("author"),
            "content"=>$request->get("content"),
            "image"=>$request->file("image")->getClientOriginalName(),
            "mostLike"=>"0",
            "like"=>0,
            "dislike"=>0
        ]);

        return redirect()->route("books");
    }
}
