<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Livewire\Component;

class Quotorians extends Component
{
    public $term = '';

    public function render()
    {
        $availableQuotorians = collect();
        if($this->term) {
            $availableQuotorians = User::where('profile_is_public', true)
                ->where('email', 'like', '%' . $this->term . '%')
                ->orWhere('name', 'like', '%' . $this->term . '%')
                ->get();
        }

        return view('livewire.pages.quotorians', [
            'availableQuotorians' => $availableQuotorians
        ]);
    }
}
