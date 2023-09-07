<?php

namespace App\Http\Livewire\Dashboard\Alumni;

use App\Models\Alumni;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $nama_alumni;
    public $idDelete;


    public function mount($alumni)
    {
        $data = Alumni::where('id_alumni', $alumni)->first();
        $this->nama_alumni = $data->nama;
        $this->idDelete = $alumni;
    }

    public function destroy($id)
    {
        Alumni::destroy('id_alumni', $id);

        $this->emit('deleted');


        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.alumni.delete');
    }
}
