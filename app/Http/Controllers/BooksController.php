<?php

namespace App\Http\Controllers;

use App\DataTables\BooksDataTable;
use App\Http\Requests\BooksRequest;
use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param BooksDataTable $dataTable
     * @return mixed
     */
    public function index(BooksDataTable $dataTable)
    {
        return $dataTable->render('books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $book = new Books();
        $operation = 'Add';
        return View::make('books.form')->with(compact('operation','book'));

    }

    private function getAuthors() {
        return Authors::all();
    }

    /**
     * Store a newly created resource in storage.
     * @param BooksRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BooksRequest $request)
    {
        $id = $request->id ?? null;
        if($id) {
            $book = Books::find($id);
        } else {
            $book = new Books();
        }
        $book->title = $request->title;

        $book->save();

        return redirect()->to('books');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @return mixed
     */
    public function edit($id)
    {
        $book = Books::find($id);
        $operation = 'Edit';
        $authorsList = $this->getAuthors();
        return View::make('books.form')->with(compact('operation','book', 'authorsList'));
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
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function destroy($id)
    {
        Books::destroy($id);

        return redirect()->back();
    }
}
