<?php

namespace App\Http\Livewire\Dashboard\TahunAkademik;

use App\Models\TahunAkademik;
use Livewire\Component;

class Create extends Component
{
    public $closeModal = false;

    // data request
    public $tahun_angkatan;

    public function store()
    {
        $this->validate([
            'tahun_angkatan' => 'required|digits:4|unique:tahun_akademik,tahun',
        ]);

        TahunAkademik::create([
            'tahun' => $this->tahun_angkatan
        ]);

        $this->emit('stored');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.tahun-akademik.create');
    }
}
