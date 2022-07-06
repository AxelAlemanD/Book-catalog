<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
    ];

    /**
     * Get the books for the current author
    */    
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    /**
     * Check if the current author has any book
     * @param Book $book
     * @return bool
     */
    public function hasAnyBook($book)
    {
        return null !== $this->books()->where('book_id', $book->id)->first();
    }
}
