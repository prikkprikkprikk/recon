<?php

declare(strict_types=1);

namespace App\Actions\ImportFiles;

use Exception;
use App\Models\ImportFile;
use Illuminate\Support\Facades\Storage;

class DeleteImportFile
{
    public static function handle(ImportFile $importFile) : bool
    {
        try
        {
            Storage::disk('local')->delete($importFile->path);
        }
        catch (Exception $e)
        {
            // If the file doesn't exist, we don't care.
        }

        return $importFile->delete();
    }
}
