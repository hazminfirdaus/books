<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;
use App\Publisher;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // '../../storage/books.json'

        $data = json_decode( file_get_contents( storage_path('books.json') ) );

        // empty the table
        \DB::statement('TRUNCATE TABLE `books`');
        \DB::statement('TRUNCATE TABLE `authors`');
        \DB::statement('TRUNCATE TABLE `publishers`');

        // dd($data); // dump and die

        // insert all the authors into db
        $authors = [];
        foreach($data as $book)
        {
            $authors[] = $book->author;
        }

        $unique_authors = array_unique($authors);

        foreach($unique_authors as $author)
        {
            $new_author = new Author;
            $new_author->name = $author;
            $new_author->save();
        }

        // insert all the publishers
        $publishers = [];
        foreach($data as $book)
        {
            $publishers[] = $book->publisher;
        }

        $unique_publishers = array_unique($publishers);

        foreach($unique_publishers as $publisher)
        {
            $new_publisher = new Publisher;
            $new_publisher->title = $publisher;
            $new_publisher->save();
        }

        // prepare a list of all authors that we can grab authors from by their names
        $all_authors = Author::all()->pluck('id', 'name')->toArray();

        // prepare a list of all publishers that we can grab authors from by their names
        $all_publishers = Publisher::all()->pluck('id', 'name')->toArray();

        
        // insert a record into the books table
        foreach($data as $book)
        {
            $new_book = new Book;
            $new_book->title   = $book->title;
            $new_book->price   = $book->price;
            $new_book->image   = $book->image;
            $new_book->authors = $book->author;
            $new_book->publication_date = $book->{ "publication-date" };
        }
        // grab the id of an author from the list prepared before
        $new_book->$publisher_id = $all_publishers[ $book->$publisher ];

        $new_book->save();

        // grab the id of a publisher from the list prepared before
        $author_id = $all_authors[ $book->author ];
    }
}