<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
  public $selectedType = ['textbook','dictionary','encyclopedia'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books = Book::latest()->paginate(5);
     return view('books.index',compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create',['selectedType'=>$this->selectedType]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      public function store(Request $request)
  {
      $request->validate([
          'title' => 'required|min:3',
          'author' => 'required',
    'publisher' => 'required',
    'type' => 'required|in:textbook,dictionary,encyclopedia',
    'year' => 'required|integer',
    'pages' => 'required|integer|min:10|max:1000',
    'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
      ]);

      Book::create($request->all());
        return redirect()->route('books.index')->with('success','Book added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
