<?php

namespace App\Http\Livewire\Components;

use App\Models\Quote;
use Livewire\Component;

class QuoteCard extends Component
{
    public Quote $quote;
    public $isEditing = false;
    public $newQuote;

    public function updateQuote()
    {
        if($this->newQuote !== $this->quote->quote && !empty($this->newQuote)) {
            $this->quote->update([
                'quote' => $this->newQuote
            ]);
            $this->isEditing = false;
        }
    }
    /**
     * Delete the quote
     */
    public function deleteQuote()
    {
        $this->quote->delete();
        $this->emit('quoteDeleted');
    }

    /**
     * The component has mounted
     */
    public function mount()
    {
        $this->newQuote = $this->quote->quote;
    }

    public function render()
    {
        return view('livewire.components.quote-card');
    }
}
