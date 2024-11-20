<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('backend.book',compact('books'));
    }

    // Books Filter
    public function booksFilter(Request $request)
    {        
        $search = $request->input('search'); 

        // Query books by title or author
        $books = Book::when($search, function ($query, $search) {
            return $query->where('title', 'LIKE', "%{$search}%")
                         ->orWhere('author', 'LIKE', "%{$search}%");
        })->paginate(10); 
        
        return view('index', compact('books', 'search'));
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
        $this->validate($request, [
            'title' => ['min:3','required'],
            'author' => ['min:3','required'],
        ]);

        $book = Book::create([
            'title'=>$request->title,
            'author'=>$request->author,
        ]);

        if($book){
            return  redirect()->route('books.index')->with('success', "Successfully Save.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('backend.bookUpdate',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['min:3','required'],
            'author' => ['min:3','required'],
        ]);

        $book = Book::where('id',$id)->update([
            'title'=>$request->title,
            'author'=>$request->author,
        ]);

        if($book){
            return  redirect()->route('books.index')->with('success', "Update Successfully.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        Book::find($id)->delete();
        return redirect()->back()->with('success', 'successfully Delete');
    }
}
