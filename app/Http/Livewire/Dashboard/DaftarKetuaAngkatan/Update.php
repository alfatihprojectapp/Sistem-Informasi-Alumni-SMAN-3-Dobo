<?php

namespace App\Http\Livewire\Dashboard\DaftarKetuaAngkatan;

use App\Models\TahunAkademik;
use App\Models\User;
use Livewire\Component;

class Update extends Component
{
    public $closeModal = false;

    // data request
    public $tahun_akademik;
    public $nama_ketua_angkatan;
    public $jenis_kelamin;
    public $nomor_handphone;
    public $pekerjaan;
    public $alamat;
    public $username ;
    public $password;

    public $idEdit;

    public function mount($ketua)
    {

        $this->tahun_akademik = $ketua['id_tahun'];
        $this->nama_ketua_angkatan = $ketua['nama'];
        $this->jenis_kelamin = $ketua['jenis_kelamin'];
        $this->nomor_handphone = $ketua['nomor_handphone'];
        $this->pekerjaan = $ketua['pekerjaan'];
        $this->alamat = $ketua['alamat'];

        $this->idEdit = $ketua['id'];
    }


    public function update($id)
    {
        $ketua = User::where('id', $id)->first();

        $rules = [
            'tahun_akademik' => 'required',
            'nama_ketua_angkatan' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'nomor_handphone' => 'required',
            'pekerjaan' => 'max:255',
            'alamat' => 'required',
        ];

        if ($this->tahun_akademik != $ketua->id_tahun) {
            $rules['tahun_akademik'] = 'required|unique:users,id_tahun';
        }

        if ($this->nomor_handphone != $ketua->nomor_handphone) {
            $rules['nomor_handphone'] = 'required|max:255|unique:users,nomor_handphone';
        }

        $this->validate($rules);

        User::where('id', $id)->update([
            'id_tahun' => $this->tahun_akademik,
            'nama' => strtoupper($this->nama_ketua_angkatan),
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
        return view('livewire.dashboard.daftar-ketua-angkatan.update',[
            'dataTahun' => TahunAkademik::orderBy('tahun', 'ASC')->get()
        ]);
    }
}
