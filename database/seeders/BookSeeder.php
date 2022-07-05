<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Book::factory(15)->create();
        Book::factory()->count(5)->create(
            new Sequence(
                ['title' => 'Architecto facere.','publication_date' => '2007-10-12', 'genre_id' => 1],
                ['title' => 'Iusto ut doloremque.','publication_date' => '1977-07-30', 'genre_id' => 3],
                ['title' => 'Enim animi non.','publication_date' => '2013-01-16', 'genre_id' => 2],
                ['title' => 'Nihil molestiae molestiae.','publication_date' => '1972-02-17', 'genre_id' => 2],
                ['title' => 'Alias sint ut.','publication_date' => '2019-11-05', 'genre_id' => 1],
            )
        );

        $books = Book::all();

        Author::all()->each(function ($author) use ($books){
            $author->books()->attach(
                $books->random(1)->pluck('id')
            );
        });
    }
}
