<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Dashboard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 100;
    public $term = '';

    public function render()
    {
        $books = $this->buildSearchHits();
        return view('livewire.dashboard', [
            'books' => $books
        ]);
    }

    /**
     * Build the Books search results
     *
     * @return LengthAwarePaginator|Builder|mixed
     */
    private function buildSearchHits()
    {
        $books = auth()->user()->books()->with('quotes')->when($this->term, function ($query) {
            $query->where('title', 'like', '%' . $this->term . '%');
            $query->orWhere('author', 'like', '%' . $this->term . '%');
            $query->orWhereHas('quotes', function($query) {
                $query->where('quote', 'like', '%' . $this->term . '%');
            });
        });

        return $books->orderBy('created_at', 'desc')
            ->paginate($this->paginate);
    }
}
