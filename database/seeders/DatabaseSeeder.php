<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\AuthorFactory;
use Database\Factories\BookFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create();
        $this->call(AuthorSeeder::class);
        $this->call(BookSeeder::class);

        $authors = Author::all();
        Book::all()->each(
            function (Book $book) use ($authors) {
               $book->authors()->attach($authors->random(rand(1, 5))->pluck('id')->toArray());
            }
        );
    }
}
