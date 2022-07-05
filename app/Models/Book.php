<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'publication_date',
        'genre_id',
    ];

    /**
     * Get the authors for the current book
    */    
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }


    /**
     * Get the genre for the current book
    */    
    public function genre()
    {
        return $this->belongsTo(Author::class);
    }
}
