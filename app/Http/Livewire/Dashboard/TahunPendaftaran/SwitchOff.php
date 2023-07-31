<?php

namespace App\Http\Livewire\Dashboard\TahunPendaftaran;

use App\Models\TahunPendaftaran;
use Livewire\Component;

class SwitchOff extends Component
{
    public $showModal = false;
    public $closeModal = false;

    public $tahun;
    public $idEdit;

    public $listeners = [
        'switchOff' => 'handleSwitchOff'
    ];

    public function handleSwitchOff($tahun)
    {
        $this->tahun = $tahun['tahun'];
        $this->idEdit = $tahun['id_tahun'];

        $this->showModal = true;

        TahunPendaftaran::where('id_tahun', $this->idEdit)->update([
            'is_actived' => 0
        ]);
    }

    public function showModalFalse()
    {
        $this->showModal = false;
        $this->emit('switchOffSuccess');
    }

    public function render()
    {
        return view('livewire.dashboard.tahun-pendaftaran.switch-off');
    }
}
