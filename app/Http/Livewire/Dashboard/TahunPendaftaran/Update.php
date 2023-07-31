<?php

namespace App\Http\Livewire\Dashboard\TahunPendaftaran;

use App\Models\TahunPendaftaran;
use Livewire\Component;

class Update extends Component
{
    public $closeModal = false;

    // data request
    public $tahun_pendaftaran;
    public $idEdit;

    public function mount($tahun)
    {
        $this->tahun_pendaftaran = $tahun['tahun'];

        $this->idEdit = $tahun['id_tahun'];
    }


    public function update($id)
    {
        $tahun = TahunPendaftaran::where('id_tahun', $id)->first();

        $rules = [
            'tahun_pendaftaran' => 'required'
        ];

        if ($this->tahun_pendaftaran != $tahun->tahun) {
            $rules['tahun_pendaftaran'] = 'required|digits:4|unique:tahun_pendaftaran,tahun';
        }

        $this->validate($rules);

        TahunPendaftaran::where('id_tahun', $id)->update([
            'tahun' => $this->tahun_pendaftaran
        ]);

        $this->emit('updated');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.tahun-pendaftaran.update');
    }
}
