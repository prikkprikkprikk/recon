<?php

use App\Models\ImportFile;
use Illuminate\Http\UploadedFile;
use App\Actions\ImportFiles\AddImportFile;
use App\Actions\ImportFiles\DeleteImportFile;


it('can delete an ImportFile', function()
{
    // Arrange
    Storage::fake('local');

    $uploadedFile = UploadedFile::fake()->create('testfile.xls', '32', 'application/vnd.ms-excel');
    $importFile = AddImportFile::handle($uploadedFile);
    $importFileID = $importFile->id;
    $importFilePath = $importFile->path;

    // Ensure the file exists so we can assert it's deleted.
    expect(ImportFile::find($importFileID))
        ->toBeInstanceOf(ImportFile::class);
    expect(Storage::disk('local')->exists($importFilePath))
        ->toBeTrue();

    // Act
    DeleteImportFile::handle($importFile);

    // Assert
    expect(ImportFile::find($importFileID))
        ->toBeNull();
    expect(Storage::disk('local')->exists($importFilePath))
        ->toBeFalse();

});
