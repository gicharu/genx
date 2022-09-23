<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorsRequest;
use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $authors = Authors::all();
        return response()->json(['data' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AuthorsRequest $request)
    {
        $author = Authors::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Author added successfully!",
            'author' => $author
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function edit(Authors $authors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuthorsRequest $request
     * @param int $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AuthorsRequest $request, int $author)
    {
        $model = Authors::find($author);
        $model->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Author Updated successfully!",
            'data' => $model
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $author)
    {
        $model = Authors::find($author);
        $model->books()->sync([]);
        $model->delete();

        return response()->json([
            'status' => true,
            'message' => "Author deleted successfully!",
        ]);
    }
}
