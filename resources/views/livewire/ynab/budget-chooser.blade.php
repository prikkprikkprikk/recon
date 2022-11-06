<div x-data="{ showSuccessMessage: false }"
    @budget-saved="showSuccessMessage = true;setTimeout(() => { showSuccessMessage = false; }, 2000);"
    class="relative w-fit"
>
    @if(count($budgets) > 1)

        <select wire:model="budgetId">

            <option
                value=""
                {{ is_null($budgetId) ? 'selected' : '' }}
                wire:key="budget-null"
            >
                Velg budsjett
            </option>

            @foreach($budgets as $budget)

                <option
                    value="{{ $budget->id }}"
                    {{ $budget->id == $budgetId ? 'selected' : '' }}
                    wire:key="budget-{{ $budget->id }}"
                >
                    {{ $budget->name }}
                </option>

            @endforeach

        </select>

        <div x-show="showSuccessMessage"
            class="w-6 h-6 bg-green-700 rounded-full absolute top-[50%] translate-y-[-50%] right-2"
        >
            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>

    @endif
</div>
