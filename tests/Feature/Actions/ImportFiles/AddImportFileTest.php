<?php

use App\Models\ImportFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Actions\ImportFiles\AddImportFile;


it('can add an UploadedFile', function()
{
    // Arrange
    Storage::fake('local');

    $uploadedFile = UploadedFile::fake()->create('testfile.xls', '32', 'application/vnd.ms-excel');

    // Act
    $importedFile = AddImportFile::handle($uploadedFile);

    // Assert
    expect($importedFile)
        ->toBeInstanceOf(ImportFile::class)
        ->original_filename->toBe('testfile.xls')
        ->path->toStartWith('import_files/')
        ->path->toEndWith('.xls')
    ;
});
