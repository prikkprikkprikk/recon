<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
        {{ __('Transformers') }}
    </h2>
</x-slot>

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-8 flex justify-end">

            <x-button wire:click="$emit('openModal', 'upload-import-file')" >
                {{ __('New Transformer') }}
            </x-button>

        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 bg-white border-b border-gray-200">

                @if($transformers->count())

                    <table class="w-full">

                        <thead class="font-bold border-b">
                            <tr>
                                <th class="p-2 text-left">
                                    Payee
                                </th>
                                <th class="p-2 text-left">
                                    Regex
                                </th>
                                <th class="p-2 text-left">
                                    Arkivref
                                    .</th>
                                <th class="p-2 text-left">
                                    Motkonto
                                </th>
                                <th class="p-2 text-center max-w-min">
                                    Handlinger
                                </th>
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
                                    <td class="p-2 border-b text-center max-w-min">
                                        <x-button>
                                            Edit
                                        </x-button>
                                        <x-button>
                                            Delete
                                        </x-button>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                    <div class="mt-6">
                        {{ $transformers->links() }}
                    </div>

                @else

                    <h2 class="mb-4 font-semibold text-lg text-gray-800 leading-tight">
                        {{ __('No transformers') }}
                    </h2>

                    <p>
                        {{ __('Try creating a new one by clicking the button above.') }}
                    </p>

                @endif

            </div>

        </div>

    </div>

</div>
