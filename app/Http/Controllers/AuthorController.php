<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{

    /**
     * Get all authors
     */
    public function getAll(){
        $authors = Author::all();
        return response()->json($authors);
    }

    /**
     * Get author by id
     * @param $id Author id to search
     */
    public function find($id){
        $author = Author::findOrFail($id);
        if(empty($author))
            return response()->json(['message' => 'author not found'], 404);
        return response()->json($author);
    }

    /**
     * Create a new author
     * @param $request
     */
    public function create(AuthorRequest $request){
        $request->validated();

        $author = new Author;
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;

        $author->save();

        return response()->json($author, 200);
    }

    /**
     * Update author information
     * @param $request
     * @param $id Author id to update
     */
    public function update(AuthorRequest $request, $id){
        $request->validated();

        $author = Author::findOrFail($id);

        if(empty($author))
            return response()->json(['message' => 'author not found'], 404);

        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;

        $author->save();

        return response()->json($author);
    }

    /**
     * Delete an author
     * @param $id Author id to delete
     */
    public function delete($id){
        $author = Author::findOrFail($id);
        
        if(empty($author))
            return response()->json(['message' => 'author not found'], 404);
        
        $author->delete();

        return response()->json(['message' => 'author removed'], 202);
    }

}
