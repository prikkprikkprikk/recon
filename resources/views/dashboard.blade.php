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
                    <h1>
                        Filformat
                    </h1>
                    <p>
                        Last ned excel-fil fra bankens arkivsøk.
                    </p>
                    <p>
                        NB! Bruk altså <em>ikke</em> nedlasting fra «Inn og ut av konto»-siden.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
