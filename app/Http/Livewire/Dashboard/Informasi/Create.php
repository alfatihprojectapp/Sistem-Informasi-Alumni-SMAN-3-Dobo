<?php

namespace App\Http\Livewire\Dashboard\Informasi;

use App\Models\Informasi;
use Livewire\Component;

class Create extends Component
{
    public $closeModal = false;

    // data request
    public $isi_informasi;

    public function store()
    {
        $this->validate([
            'isi_informasi' => 'required'
        ]);

        Informasi::create([
            'kode_informasi' => mt_rand(00000000, 99999999),
            'isi_informasi' => $this->isi_informasi
        ]);

        $this->emit('stored');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.informasi.create');
    }
}
