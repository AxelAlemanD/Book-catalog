<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    /**
     * Get all Books
     */
    public function getAll(){
        $books = Book::with('authors')->get();
        return response()->json($books);
    }

    /**
     * Get Book by id
     * @param $id Book id to search
     */
    public function find($id){
        $book = Book::with('authors')->findOrFail($id);
        if(empty($book))
            return response()->json(['message' => 'Book not found'], 404);
        return response()->json($book);
    }

    /**
     * Create a new Book
     * @param $request
     */
    public function create(BookRequest $request){
        $request->validated();

        $book = new Book;
        $book->title = $request->title;
        $book->publication_date = $request->publication_date;
        $book->genre_id = $request->genre_id;

        $book->save();

        return response()->json($book, 200);
    }

    /**
     * Update Book information
     * @param $request
     * @param $id Book id to update
     */
    public function update(BookRequest $request, $id){
        $request->validated();

        $book = Book::with('authors')->findOrFail($id);

        if(empty($book))
            return response()->json(['message' => 'Book not found'], 404);

        $book->title = $request->title;
        $book->publication_date = $request->publication_date;
        $book->genre_id = $request->genre_id;

        $book->save();

        return response()->json($book);
    }

    /**
     * Delete an Book
     * @param $id Book id to delete
     */
    public function delete($id){
        $book = Book::findOrFail($id);
        
        if(empty($book))
            return response()->json(['message' => 'Book not found'], 404);
        
        $book->delete();

        return response()->json(['message' => 'Book removed'], 202);
    }


    /**
     * Assign author to book
     * @param $request
     * @param $id Book id
     */
    public function assignAutor(Request $request, $id){
        
        $validated = $request->validate([
            'authorId' => 'required|numeric',
        ]);

        $book = Book::findOrFail($id);

        if(empty($book))
            return response()->json(['message' => 'Book not found'], 404);

        $author = Book::findOrFail($request->authorId);

        // If the book does not have the author, it is added
        if (!($book->hasAnyAuthor($author))) {
            $book->authors()->attach($author);
        }
        
        $book = Book::with('authors')->findOrFail($id);

        return response()->json($book);
    }

    /**
     * remove author to book
     * @param $request
     * @param $id Book id
     */
    public function removeAutor(Request $request, $id){
        
        $validated = $request->validate([
            'authorId' => 'required|numeric',
        ]);

        $book = Book::findOrFail($id);

        if(empty($book))
            return response()->json(['message' => 'Book not found'], 404);

        $author = Book::findOrFail($request->authorId);

        // If the book does have the author, it is removed
        if ($book->hasAnyAuthor($author)) {
            $book->authors()->detach($author);
        }
        
        $book = Book::with('authors')->findOrFail($id);

        return response()->json($book);
    }

}
