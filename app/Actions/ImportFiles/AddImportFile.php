<?php

declare(strict_types=1);

namespace App\Actions\ImportFiles;

use App\Models\ImportFile;
use Illuminate\Http\UploadedFile;

class AddImportFile
{
    public static function handle(UploadedFile $importFile) : ImportFile
    {
        $originalFilename = $importFile->getClientOriginalName();

        $path = $importFile->store('import_files');

        return ImportFile::create([
            'original_filename' => $originalFilename,
            'path' => $path,
        ]);
    }
}
