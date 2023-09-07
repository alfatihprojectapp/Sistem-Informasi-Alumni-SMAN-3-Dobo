<?php

namespace App\Http\Livewire\Dashboard\DaftarKetuaAngkatan;

use App\Models\User;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $tahun_akademik;
    public $idDelete;


    public function mount($ketua)
    {
        $data = User::where('id', $ketua)->first();
        $this->tahun_akademik = $data->tahun->tahun;
        $this->idDelete = $ketua;
    }

    public function destroy($id)
    {
        User::destroy('id', $id);

        $this->emit('deleted');


        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.daftar-ketua-angkatan.delete');
    }
}
