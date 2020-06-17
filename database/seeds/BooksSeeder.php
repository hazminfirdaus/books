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
        $data = json_decode( file_get_contents( storage_path('books.json') ) );

        // empty the tables
        \DB::statement('TRUNCATE TABLE `books`');
        \DB::statement('TRUNCATE TABLE `authors`');
        \DB::statement('TRUNCATE TABLE `publishers`');

        // insert all the authors into db
        $authors = [];
        foreach ($data as $book) {
            $authors[] = $book->author; // add author name into array $authors
        }

        $unique_authors = array_unique($authors);

        foreach ($unique_authors as $author) {
            $new_author = new Author;
            $new_author->name = $author;
            $new_author->save();
        }
        
        // insert all the publishers
        $publishers = [];
        foreach ($data as $book) {
            $publishers[] = $book->publisher; // add author name into array $authors
        }

        $unique_publishers = array_unique($publishers);

        foreach ($unique_publishers as $publisher) {
            $new_publisher = new Publisher;
            $new_publisher->title = $publisher;
            $new_publisher->save();
        }

        // prepare a list of all authors that we can grab authors from by their names
        $all_authors = Author::all()->pluck('id', 'name')->toArray();
        
        // prepare a list of all publishers that we can grab publishers from by their names
        $all_publishers = Publisher::all()->pluck('id', 'title')->toArray();

        foreach ($data as $book) {

            // insert a record into the books table
            $new_book = new Book;
            $new_book->title   = $book->title;
            $new_book->price   = $book->price;
            $new_book->image   = $book->image;
            $new_book->authors = $book->author;
            $new_book->publication_date = date('Y-m-d H:i:s', strtotime($book->{"publication-date"}));

            // grab the id of an publisher from the list prepared before
            $new_book->publisher_id = $all_publishers[ $book->publisher ];

            // save the book (so that we know its id for the table author_book)
            $new_book->save();

            // grab the id of an author from the list prepared before
            $author_id = $all_authors[ $book->author ];

            // attach $author_id to the book through the relationship "authors"
            $new_book->authors()->attach($author_id);
        }
    }
}