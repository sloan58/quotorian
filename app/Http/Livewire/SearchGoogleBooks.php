<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchGoogleBooks extends Component
{
    public $term = '';
    public $searching = false;

    public function addToBookShelf($googleBook)
    {
        info('added', [$googleBook]);
    }

    public function render()
    {
        $googleBooks = $this->buildSearchHits();
        return view('livewire.search-google-books', [
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

            return $response->json()['items'];
        }
        return [];
    }
}
