<?php

namespace App\Http\Livewire;

use App\Models\Alumni;
use App\Models\TahunAkademik;
use Livewire\Component;

class Beranda extends Component
{
    public function render()
    {
        return view('livewire.beranda',[
            'alumni' => Alumni::get(),
            'dataTahun' => TahunAkademik::orderBy('tahun', 'ASC')->get(),
        ])->layout('index');
    }
}
