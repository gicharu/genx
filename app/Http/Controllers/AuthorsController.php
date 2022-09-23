<?php

namespace App\Http\Controllers;

use App\DataTables\AuthorsDataTable;
use App\Http\Requests\AuthorsRequest;
use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param AuthorsDataTable $dataTable
     * @return mixed
     */
    public function index(AuthorsDataTable $dataTable)
    {
        return $dataTable->render('authors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $author = new Authors();
        $operation = 'Add';
        return View::make('authors.form')->with(compact('operation','author'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AuthorsRequest $request)
    {
        $id = $request->id ?? null;
        if($id) {
          $author = Authors::find($id);
        } else {
            $author = new Authors();
        }
        $author->first_name = $request->first_name;
        $author->surname = $request->surname;

        $author->save();

        return redirect()->to('authors');

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
        $author = Authors::find($id);
        $operation = 'Edit';
        return View::make('authors.form')->with(compact('operation','author'));
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function destroy($id)
    {
        $author = Authors::find($id);
        $author->books()->sync([]);
        $author->delete();
        return redirect()->back();
    }
}
