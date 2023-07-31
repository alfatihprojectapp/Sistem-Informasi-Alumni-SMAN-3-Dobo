<?php

namespace App\Http\Livewire\Dashboard\Informasi;

use App\Models\Informasi;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $idDelete;

    public function mount($informasi)
    {
        $this->idDelete = $informasi;
    }

    public function destroy($id)
    {
        Informasi::destroy('id_informasi', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.informasi.delete');
    }
}
