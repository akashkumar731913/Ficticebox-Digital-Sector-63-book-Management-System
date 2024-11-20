<?php

namespace App\Http\Controllers;

use App\Models\RatingComment;
use Illuminate\Http\Request;

use Auth;

class RatingCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratingComments = RatingComment::with('user','book')->get();
        return view('backend.ratingComments',compact('ratingComments'));
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
            'book_id' => ['required'],
            'rating'.$request->book_id => ['required'],
            // 'comment'.$request->book_id => ['required'],
        ]);

        // Retrieve values dynamically from request
        $book = RatingComment::create([
            'user_id'=>Auth::user()->id,
            'book_id'=>$request->book_id,
            'rating'=>$request->input('rating'.$request->book_id),
            'comment'=>$request->input('comment'.$request->book_id),
        ]);

        if($book){
            return  redirect()->route('index')->with('success', "Rating Successfully Save.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RatingComment  $ratingComment
     * @return \Illuminate\Http\Response
     */
    public function show(RatingComment $ratingComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RatingComment  $ratingComment
     * @return \Illuminate\Http\Response
     */
    public function edit(RatingComment $ratingComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RatingComment  $ratingComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RatingComment $ratingComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RatingComment  $ratingComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RatingComment::find($id)->delete();
        return redirect()->back()->with('success', 'successfully Delete');
    }
}
