<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class ShowTransactions extends Component
{
    public $transactions;

    public function mount()
    {
        $this->transactions = Transaction::orderBy('sort_order','desc')->get();
    }
    public function render()
    {
        return view('livewire.show-transactions');
    }
}
