<div x-data>

    <x-slot name="header">

        <div class="flex justify-between items-end">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Imports') }}
            </h2>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8 flex justify-end">

                <x-button wire:click="$emit('openModal', 'upload-import-file')" >
                    {{ __('New Import') }}
                </x-button>

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">

                    @if($imports->count())

                        <table class="w-full">

                            <thead class="font-bold border-b">
                                <tr>
                                    <th class="p-2 text-center max-w-min">
                                        Importert
                                    </th>
                                    <th class="p-2 text-left">
                                        Filnavn
                                    </th>
                                    <th class="p-2 text-left">
                                        Tidspunkt
                                    </th>
                                    <th class="p-2 text-center max-w-max">
                                        Handlinger
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($imports as $import)

                                    <tr importid="{{ $import->id }}">

                                        <td class="p-2 border-b text-center max-w-min">
                                            {{ $import->status ? '✅' : '–' }}
                                        </td>

                                        <td class="p-2 border-b text-left">
                                            {{ $import->original_filename }}
                                        </td>

                                        <td class="p-2 border-b text-left">
                                            {{ $import->created_at }}
                                        </td>

                                        <td class="p-2 border-b text-center max-w-max">

                                            <div class="flex gap-2 justify-center">

                                                <x-button
                                                    wire:click="delete({{ $import->id }})"
                                                    class="hover:bg-red-800"
                                                >
                                                    Delete
                                                </x-button>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    @else

                        <h2 class="mb-4 font-semibold text-lg text-gray-800 leading-tight">
                            {{ __('No import files') }}
                        </h2>

                        <p>
                            {{ __('Upload a new file by clicking the button above.') }}
                        </p>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>
