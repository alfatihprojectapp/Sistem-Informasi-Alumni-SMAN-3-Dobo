<?php

namespace App\Http\Livewire;

use App\Models\Informasi as ModelsInformasi;
use Livewire\Component;

class Informasi extends Component
{
    public function render()
    {
        return view('livewire.informasi', [
            'informasi' => ModelsInformasi::orderBy('id_informasi', 'DESC')->get()
        ])->layout('index');
    }
}
