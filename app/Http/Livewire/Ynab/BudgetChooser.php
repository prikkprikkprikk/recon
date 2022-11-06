<?php

namespace App\Http\Livewire\Ynab;

use Livewire\Component;
use App\Services\YnabApi;
use App\Actions\UserSettings\LoadUserSetting;
use App\Actions\UserSettings\SaveUserSetting;

class BudgetChooser extends Component
{
    public $budgetId;

    public function mount()
    {
        $this->budgetId = LoadUserSetting::execute(setting: 'budgetId');
    }

    public function render()
    {
        return view('livewire.ynab.budget-chooser', [
            'budgets' => app(YnabApi::class)->budgets()
        ]);
    }

    // when user selects a budget, save it to the user settings
    public function updatedBudgetId($value)
    {
        SaveUserSetting::execute(
            setting: 'budgetId',
            value: $value
        );

        $this->dispatchBrowserEvent('budget-saved', ['message' => 'Budsjettvalg lagret']);
    }
}
