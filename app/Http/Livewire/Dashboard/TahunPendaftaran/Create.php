<?php

namespace App\Http\Livewire\Dashboard\TahunPendaftaran;

use App\Models\TahunPendaftaran;
use Livewire\Component;

class Create extends Component
{
    public $closeModal = false;

    // data request
    public $tahun_pendaftaran;

    public function store()
    {
        $this->validate([
            'tahun_pendaftaran' => 'required|digits:4|unique:tahun_pendaftaran,tahun',
        ]);

        TahunPendaftaran::create([
            'tahun' => $this->tahun_pendaftaran
        ]);

        $this->emit('stored');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.tahun-pendaftaran.create');
    }
}
