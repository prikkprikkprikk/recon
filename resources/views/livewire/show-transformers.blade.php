<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Transformers') }}
        <button class="bg-slate-600 text-white px-4 py-2 rounded text-base">
            Ny
        </button>
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <table>
                    <thead class="font-bold border-b">
                        <tr>
                            <th class="p-2">Payee</th>
                            <th class="p-2">Regex</th>
                            <th class="p-2">Arkivref.</th>
                            <th class="p-2">Motkonto</th>
                            <th class="p-2">Handlinger</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transformers as $transformer)
                        <tr transformerid="{{ $transformer->id }}" wire:model="$transformer">
                            <td class="p-2 border-b">
                                {{ $transformer->payee }}
                            </td>
                            <td class="p-2 border-b">
                                {{ $transformer->description_regex }}
                            </td>
                            <td class="p-2 border-b">
                                {{ $transformer->archival_reference }}
                            </td>
                            <td class="p-2 border-b">
                                {{ $transformer->contra_account }}
                            </td>
                            <td class="p-2 border-b">
                                <button>
                                    Edit
                                </button>
                                <button>
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
