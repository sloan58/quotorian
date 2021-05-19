<?php

namespace Database\Seeders;

use Exception;
use Faker\Factory;
use App\Models\Book;
use App\Models\Quote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $url = 'https://www.googleapis.com/books/v1/volumes?q=Samantha&maxResults=40';

        $response = Http::get($url);

        foreach($response->json()['items'] as $book) {
            if(Book::hasNecessaryAttributes($book)) {
                try {
                    $book = Book::create([
                        'book_id' => $book['id'],
                        'title' => $book['volumeInfo']['title'],
                        'author' => implode(',', $book['volumeInfo']['authors']) ?? 'Unknown',
                        'publishedDate' => $book['volumeInfo']['publishedDate'],
                        'description' => $book['volumeInfo']['description'],
                        'pageCount' => $book['volumeInfo']['pageCount'],
                        'thumbnail' => $book['volumeInfo']['imageLinks']['thumbnail']
                    ]);
                    $book->users()->attach(1);
                    for($i=0; $i<=10; $i++) {
                        Quote::create([
                            'quote' => $faker->paragraph(),
                            'user_id' => 1,
                            'book_id' => $book->id
                        ]);
                    }
                } catch(Exception $e) {
                    info($e->getMessage(), $book);
                }
            }
        }
    }
}
