<div id="upload-import-file"
    x-data="{
        dialog: $el,
        form: $el.querySelector('form'),
    }"
    class="p-4"
>

    <h1 class="mb-4 font-bold text-xl text-center">
        Last opp fil
    </h1>

    <form wire:submit.prevent="save" class="w-full bg-slate-200 rounded p-4 flex flex-col items-center gap-4">

        <div class="mb-4 w-full flex flex-col items-center">

            <input wire:model="importFile" type="file"
                class="w-full bg-white p-2"
            >

            @error('importFile')
                <div class="text-red-700">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="w-full flex gap-4 justify-center">

            <x-button
                wire:click.prevent="$emit('closeModal')"
                class="bg-slate-400 whitespace-nowrap"
            >
                Avbryt
            </x-button>

            <x-button
                type="submit"
                class="max-w-max whitespace-nowrap"
            >
                Last opp
            </x-button>

        </div>

    </form>

    <div class="mt-4">

        <h2 class="font-bold text-lg">
            Filformat
        </h2>

        <p>
            Last ned excel-fil fra bankens arkivsøk.
        </p>
        <p>

            NB! Bruk altså <em>ikke</em> nedlasting fra «Inn og ut av konto»-siden.
        </p>

    </div>

</div>
