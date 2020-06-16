<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // '../../storage/books.json'

        $data = json_decode( file_get_contents( storage_path('books.json') ) );

        dd($data);
    }
}
