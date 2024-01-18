<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return view('product.bookview', ['books' => $books]);
        // return response()->json($books);
    }
    public function create()
    {
        return view('product.newBook');
    }
    public function storeBook(Request $request)
    {
       $request->validate([
        'name'=>'required',
        'author'=>'required',
        'publish_date'=>'required'
       ]);
        $books = new Books;
        $books->name = $request->name;
        $books->author = $request->author;
        $books->publish_date = $request->publish_date;
        $books->save();
        // return response()->json([
        //     "message" => "Book Added"
        // ], 201);
        $books = Books::all();
        return view('product.bookview', ['books' => $books]);
    }
    public function show($id)
    {
        $book = Books::find($id);
        if (!empty($book)) {
            return response()->json($book);
        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }

    }
    public function edit($id)
    {
        $books = Books::where('id', $id)->first();

        return view('product.editBook', ['books' => $books]);
    }
    public function update(Request $request, $id)
    {
        if (Books::where('id', $id)->exists()) {

            $book = Books::find($id);
            $book->name = is_null($request->name) ? $book->name : $request->name;
            $book->author = is_null($request->author) ? $book->author : $request->author;
            $book->publish_date = is_null($request->publish_date) ? $book->publish_date : $request->publish_date;
            $book->save();
            return response()->json([
                "message" => "Book updated"
            ], 404);
        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }

    }
    public function destroy($id)
    {
        if (Books::where('id', $id)->exists()) {
            $book = Books::find($id);
            $book->delete();
            return response()->json([
                "message" => "Record deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }
}
