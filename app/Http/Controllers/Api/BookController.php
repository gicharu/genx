<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BooksRequest;
use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Books::all();
        return response()->json(['data' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BooksRequest $request)
    {
        $book = Books::create($request->all());
        $this->storeAuthors($request, $book);
        return response()->json([
            'status' => true,
            'message' => "Book added successfully!",
            'data' => $book
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Books $books
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Books $books
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BooksRequest $request
     * @param int $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BooksRequest $request, int $book)
    {
        $model = Books::find($book);
        $model->update($request->all());
        $pivotData = [];
        $this->storeAuthors($request, $model);

        return response()->json([
            'status' => true,
            'message' => "Book Updated successfully!",
            'data' => $model
        ]);
    }

    private function storeAuthors(BooksRequest $request, Books $model)
    {
        $bookAuthors = json_decode($request->authors);
        foreach ($bookAuthors as $author) {
            $pivotData[] = [ 'book_id' => $model->id,'author_id' => $author];
        }
        $model->authors()->sync($pivotData);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $book)
    {
        $model = Books::find($book);
        $model->authors()->sync([]);
        $model->delete();

        return response()->json([
            'status' => true,
            'message' => "Book deleted successfully!",
        ]);
    }
}
