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
                            <th class="p-2">Bokført</th>
                            <th class="p-2">Rentedato</th>
                            <th class="p-2">Tekstkode</th>
                            <th class="p-2">Beskrivelse</th>
                            <th class="p-2 text-right">Beløp</th>
                            {{-- <td class="p-2">Arkivref</td>
                            <td class="p-2">Motkonto</td> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr transactionid="{{ $transaction->id }}" wire:model="$transaction">
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>

const highlightBg = 'bg-blue-100'
let selectedRow = document.querySelector('tbody tr')
selectedRow.classList.add( highlightBg )

document.addEventListener('keydown', function($ev) {
    if($ev.key=='ArrowUp') {
        $ev.preventDefault()
        console.log('up')
    }
    if($ev.key=='ArrowDown') {
        $ev.preventDefault()
        console.log('down')
    }
    if($ev.key=='ArrowLeft') {
        $ev.preventDefault()
        selectedRow.classList.remove( highlightBg )
        selectedRow = selectedRow.previousElementSibling || selectedRow
        selectedRow.classList.add( highlightBg )
        console.log("selected row has ID: ", selectedRow.getAttribute('transactionid'))
    }
    if($ev.key=='ArrowRight') {
        $ev.preventDefault()
        selectedRow.classList.remove( highlightBg )
        selectedRow = selectedRow.nextElementSibling || selectedRow
        selectedRow.classList.add( highlightBg )
        console.log("selected row has ID: ", selectedRow.getAttribute('transactionid'))
    }
})

</script>
