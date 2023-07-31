<?php

namespace App\Http\Livewire\Dashboard\Informasi;

use App\Models\Informasi;
use Livewire\Component;

class Update extends Component
{
    public $closeModal = false;

    // data request
    public $isi_informasi;

    public $idEdit;

    public function mount($informasi)
    {
        $this->isi_informasi = $informasi['isi_informasi'];

        $this->idEdit = $informasi['id_informasi'];
    }

    public function update($id)
    {
        $this->validate([
            'isi_informasi' => 'required'
        ]);

        Informasi::where('id_informasi', $id)->update([
            'isi_informasi' => $this->isi_informasi
        ]);

        $this->emit('updated');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.informasi.update');
    }
}
