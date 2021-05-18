<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchGoogleBooks extends Component
{
    public $term = '';

    protected $listeners = ['bookAdded' => 'bookAdded'];

    /**
     * A bookAdded event was fired
     *
     * @param $message
     * @param $type
     */
    public function bookAdded($message, $type)
    {
        flash($message)->{$type}();
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
