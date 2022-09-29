<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TransactionTransformer;

class ShowTransformers extends Component
{
    public $transformers;

    public function mount()
    {
        $this->transformers = TransactionTransformer::get();
    }
    public function render()
    {
        return view('livewire.show-transformers');
    }
}
