<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 prose">

                    <ul>
                        <li>
                            Antall ventende importeringer: {{-- $pendingImports --}}
                        </li>
                        <li>
                            Dato for sist importerte transaksjon: {{-- $lastImportedTransactionDate --}}
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 prose">

                    <h2>Budsjett</h2>
                    <ul>
                        @php
                            $ynabApi = app(App\Services\YnabApi::class)
                        @endphp
                        @foreach ($ynabApi->getBudgets() as $budget)
                            <li>
                                {{ $budget->name }}
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
