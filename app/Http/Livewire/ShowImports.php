<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ImportFile;
use App\Actions\ImportFiles\DeleteImportFile;

class ShowImports extends Component
{
    public $imports;

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'refreshImports' => 'refreshImports',
    ];

    public function mount()
    {
        $this->imports = ImportFile::orderBy('created_at','desc')->get();
    }

    public function render()
    {
        return view('livewire.show-imports');
    }

    public function refreshImports()
    {
        ray('refreshImports');
        $this->imports = ImportFile::orderBy('created_at','desc')->get();
    }

    public function delete($id)
    {
        $import = ImportFile::find($id);
        DeleteImportFile::handle($import);
        $this->emitSelf('refreshComponent');
    }
}
