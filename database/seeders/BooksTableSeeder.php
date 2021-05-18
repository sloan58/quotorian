<?php

namespace Database\Seeders;

use App\Models\Book;
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
        $url = 'https://www.googleapis.com/books/v1/volumes?q=Samantha&maxResults=40';

        $response = Http::get($url);

        foreach($response->json()['items'] as $book) {
            try {
                $book = Book::create([
                    'book_id' => $book['id'],
                    'title' => $book['volumeInfo']['title'],
                    'author' => implode(',', $book['volumeInfo']['authors']) || 'Unknown',
                    'publishedDate' => $book['volumeInfo']['publishedDate'],
                    'description' => $book['volumeInfo']['description'],
                    'pageCount' => $book['volumeInfo']['pageCount'],
                    'thumbnail' => $book['volumeInfo']['imageLinks']['thumbnail']
                ]);
                $book->users()->attach(1);
            } catch(\Exception $e) {
                info($e->getMessage(), $book);
            }
        }
    }
}
