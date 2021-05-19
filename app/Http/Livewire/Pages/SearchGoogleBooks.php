<?php

namespace App\Http\Livewire\Pages;

use App\Models\Book;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchGoogleBooks extends Component
{
    public $term = '';

    public function render()
    {
        $googleBooks = $this->buildSearchHits();
        return view('livewire.pages.search-google-books', [
            'googleBooks' => $googleBooks
        ]);
    }

    /**
     * Search Google Books API
     */
    private function buildSearchHits()
    {
        if(!empty($this->term)) {
            $url = "https://www.googleapis.com/books/v1/volumes?q={$this->term}&maxResults=40";
            $response = Http::get($url);

            $userBookshelf = auth()->user()->books()
                ->get()
                ->pluck('book_id')
                ->toArray();

            $eligibleBooks = array_filter($response->json()['items'], function($book) {
                if(Book::hasNecessaryAttributes($book)) {
                    return true;
                }
            });

            return array_filter($eligibleBooks, function($book) use ($userBookshelf){
                return !in_array($book['id'], $userBookshelf);
            });
        }
        return [];
    }
}
