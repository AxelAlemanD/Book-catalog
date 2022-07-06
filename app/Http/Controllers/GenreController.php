<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
        /**
     * Get all Genres
     */
    public function getAll(){
        $genres = Genre::all();
        return response()->json($genres);
    }

    /**
     * Get Genre by id
     * @param $id Genre id to search
     */
    public function find($id){
        $genre = Genre::findOrFail($id);
        if(empty($genre))
            return response()->json(['message' => 'Genre not found'], 404);
        return response()->json($genre);
    }

    /**
     * Create a new Genre
     * @param $request
     */
    public function create(Request $request){
        
        $validated = $request->validate([
            'name' => 'required|unique:genres|max:50',
        ]);

        $genre = new Genre;
        $genre->name = $request->name;

        $genre->save();

        return response()->json($genre, 200);
    }

    /**
     * Update Genre information
     * @param $request
     * @param $id Genre id to update
     */
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|unique:genres|max:50',
        ]);

        $genre = Genre::findOrFail($id);

        if(empty($genre))
            return response()->json(['message' => 'Genre not found'], 404);

        $genre->name = $request->name;

        $genre->save();

        return response()->json($genre);
    }

    /**
     * Delete an Genre
     * @param $id Genre id to delete
     */
    public function delete($id){
        $genre = Genre::findOrFail($id);
        
        if(empty($genre))
            return response()->json(['message' => 'Genre not found'], 404);
        
        $genre->delete();

        return response()->json(['message' => 'Genre removed'], 202);
    }

}
