<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TransactionTransformer;

class ShowTransformers extends Component
{
    use WithPagination;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.show-transformers', [
            'transformers' => TransactionTransformer::paginate(10),
        ]);
    }
}
