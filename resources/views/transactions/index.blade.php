<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaksjoner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead class="font-bold border-b">
                            <tr>
                                <td class="p-2">Bokført</td>
                                <td class="p-2">Rentedato</td>
                                <td class="p-2">Tekstkode</td>
                                <td class="p-2">Beskrivelse</td>
                                <td class="p-2 text-right">Beløp</td>
                                {{-- <td class="p-2">Arkivref</td>
                                <td class="p-2">Motkonto</td> --}}
                            </tr>
                        </thead>
                    @foreach ($transactions as $transaction)
                    <tr transactionid="{{ $transaction->id }}">
                        <td class="p-2 border-b">
                            {{ $transaction->posted_date }}
                        </td>
                        <td class="p-2 border-b">
                            {{ $transaction->interest_date }}
                        </td>
                        <td class="p-2 border-b">
                            {{ $transaction->text_code }}
                        </td>
                        <td class="p-2 border-b">
                            {{ $transaction->description }}
                        </td>
                        <td class="p-2 border-b text-right whitespace-nowrap">
                            {!! number_format(($transaction->amount/100), 2, ',', '&thinsp;') !!}
                        </td>
                        {{-- <td class="p-2 border-b">
                            {{ $transaction->archival_reference }}
                        </td>
                        <td class="p-2 border-b">
                            {{ $transaction->contra_account }}
                        </td> --}}
                    </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
