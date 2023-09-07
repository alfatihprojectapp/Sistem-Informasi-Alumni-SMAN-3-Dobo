<?php

namespace App\Http\Livewire\Dashboard\Alumni;

use App\Models\Alumni;
use App\Models\TahunAkademik;
use Livewire\Component;

class Create extends Component
{
    public $closeModal = false;

    // data request
    public $tahun_akademik;
    public $nama_alumni;
    public $jenis_kelamin;
    public $nomor_handphone;
    public $pekerjaan;
    public $alamat;

    public function store()
    {
        $this->validate([
            'tahun_akademik' => 'required',
            'nama_alumni' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'nomor_handphone' => 'required|max:255',
            'pekerjaan' => 'max:255',
            'alamat' => 'required',
        ]);

        Alumni::create([
            'id_tahun' => $this->tahun_akademik,
            'nama' => strtoupper($this->nama_alumni),
            'jenis_kelamin' => $this->jenis_kelamin,
            'nomor_handphone' => $this->nomor_handphone,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
        ]);

        $this->emit('stored');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.alumni.create',[
            'dataTahun' => TahunAkademik::orderBy('tahun', 'ASC')->get()
        ]);
    }
}
