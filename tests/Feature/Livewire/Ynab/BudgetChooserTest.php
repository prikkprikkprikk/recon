<?php

namespace Tests\Feature\Livewire\Ynab;

use App\Http\Livewire\Ynab\BudgetChooser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

it('can load the budget chooser', function () {
    Livewire::test(BudgetChooser::class)
        ->assertSee('Velg budsjett');
});
