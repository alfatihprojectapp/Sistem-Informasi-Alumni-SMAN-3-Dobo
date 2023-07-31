<?php

namespace App\Http\Livewire\Dashboard\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class Create extends Component
{
    public $closeModal = false;

    // data request
    public $nama_jurusan;

    public function store()
    {
        $this->validate([
            'nama_jurusan' => 'required|max:255|unique:jurusan,nama_jurusan',
        ]);

        Jurusan::create([
            'kode_jurusan' => mt_rand(0000000, 99999999),
            'nama_jurusan' => $this->nama_jurusan
        ]);

        $this->emit('stored');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.jurusan.create');
    }
}
