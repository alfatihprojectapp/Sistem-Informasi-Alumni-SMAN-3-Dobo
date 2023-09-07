<?php

namespace App\Http\Livewire\Dashboard\Alumni;

use App\Models\Alumni;
use App\Models\TahunAkademik;
use Livewire\Component;

class Update extends Component
{
    public $closeModal = false;

    // data request
    public $tahun_akademik;
    public $nama_alumni;
    public $jenis_kelamin;
    public $nomor_handphone;
    public $pekerjaan;
    public $alamat;
    public $username ;
    public $password;

    public $idEdit;

    public function mount($alumni)
    {

        $this->tahun_akademik = $alumni['id_tahun'];
        $this->nama_alumni = $alumni['nama'];
        $this->jenis_kelamin = $alumni['jenis_kelamin'];
        $this->nomor_handphone = $alumni['nomor_handphone'];
        $this->pekerjaan = $alumni['pekerjaan'];
        $this->alamat = $alumni['alamat'];

        $this->idEdit = $alumni['id_alumni'];
    }


    public function update($id)
    {
        $this->validate([
            'tahun_akademik' => 'required',
            'nama_alumni' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'nomor_handphone' => 'required|max:255',
            'pekerjaan' => 'max:255',
            'alamat' => 'required',
        ]);

        Alumni::where('id_alumni', $id)->update([
            'id_tahun' => $this->tahun_akademik,
            'nama' => strtoupper($this->nama_alumni),
            'jenis_kelamin' => $this->jenis_kelamin,
            'nomor_handphone' => $this->nomor_handphone,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
        ]);

        $this->emit('updated');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.alumni.update',[
            'dataTahun' => TahunAkademik::orderBy('tahun', 'ASC')->get()
        ]);
    }
}
