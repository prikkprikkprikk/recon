<?php

use Livewire\Livewire;
use Illuminate\Http\UploadedFile;
use App\Http\Livewire\UploadImportFile;
use Illuminate\Support\Facades\Storage;

it('can render the component', function() {
    {
        $component = Livewire::test(UploadImportFile::class);

        $component->assertStatus(200);
    }
});

it('can receive a valid file', function() {

    Storage::fake('tmp-for-tests');

    $file = UploadedFile::fake()->create('testfile.xls', '32', 'application/vnd.ms-excel');

    $importedFile = Livewire::test(UploadImportFile::class)
        ->set('importFile', $file)
        ->call('save')
        ->get('importedFile');

    Storage::disk('tmp-for-tests')->assertExists($importedFile->path);

});

it('rejects invalid file type', function() {

    Storage::fake('tmp-for-tests');

    $file = UploadedFile::fake()->create('testfile.csv', '32', 'text/csv');

    $importedFile = Livewire::test(UploadImportFile::class)
        ->set('importFile', $file)
        ->call('save')
        ->assertHasErrors();

});
