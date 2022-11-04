<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use App\Actions\ImportFiles\AddImportFile;

class UploadImportFile extends ModalComponent
{
    use WithFileUploads;

    public $importFile;
    public $importedFile;

    protected $rules = [
        'importFile' => [
            'required',
            'file',
            'mimes:xls',
        ],
    ];

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.upload-import-file');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $this->importedFile = AddImportFile::handle($this->importFile);

        $this->closeModal();

        $this->emit('refreshImports');
    }
}
