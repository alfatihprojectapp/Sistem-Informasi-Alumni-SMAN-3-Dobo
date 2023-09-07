<?php

namespace App\Http\Livewire\Dashboard\TahunAkademik;

use App\Models\TahunAkademik;
use Livewire\Component;

class Update extends Component
{
    public $closeModal = false;

    // data request
    public $tahun_angkatan;
    public $idEdit;

    public function mount($tahun)
    {
        $this->tahun_angkatan = $tahun['tahun'];

        $this->idEdit = $tahun['id_tahun'];
    }


    public function update($id)
    {
        $tahun = TahunAkademik::where('id_tahun', $id)->first();

        $rules = [
            'tahun_angkatan' => 'required'
        ];

        if ($this->tahun_angkatan != $tahun->tahun) {
            $rules['tahun_angkatan'] = 'required|digits:4|unique:tahun_akademik,tahun';
        }

        $this->validate($rules);

        TahunAkademik::where('id_tahun', $id)->update([
            'tahun' => $this->tahun_angkatan
        ]);

        $this->emit('updated');

        $this->closeModal = true;

        session()->flash('message');
    }
    
    public function render()
    {
        return view('livewire.dashboard.tahun-akademik.update');
    }
}
