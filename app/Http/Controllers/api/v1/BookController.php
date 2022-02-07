<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Book::all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'publication_date' => 'required',
            'amount_owned' => 'required'
        ]);

        Book::create($request->all());
        return response()->json('Book has been saved succesfully', Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'publication_date' => 'required',
            'amount_owned' => 'required'
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book, Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        
        return response()->json("Book has been successfully deleted", Response::HTTP_OK);
    }

    public function searchBook($title)
    { 
        try {
            $search = Book::where("title", "LIKE", "%".$title."%")->get();

        } catch (ModelNotFoundException $th) {
            return response()->json("I don't know of that book", Response::HTTP_NOT_FOUND);
        }
        return response()->json($search, Response::HTTP_OK);
    }
}
