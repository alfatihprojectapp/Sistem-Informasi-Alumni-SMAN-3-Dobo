<?php

namespace App\Http\Livewire\Dashboard\DaftarKetuaAngkatan;

use App\Models\TahunAkademik;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
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

    public function store()
    {
        $this->validate([
            'tahun_akademik' => 'required|unique:users,id_tahun',
            'nama_ketua_angkatan' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'nomor_handphone' => 'required|max:255|unique:users,nomor_handphone',
            'pekerjaan' => 'max:255',
            'alamat' => 'required',
        ]);

        $tahun = TahunAkademik::where('id_tahun', '=', $this->tahun_akademik)->first();

        $username =  $tahun->id_tahun.''. strtoupper(Str::random(3)).''. mt_rand(000,999).''.$tahun->tahun;

        User::create([
            'id_tahun' => $tahun->id_tahun,
            'nama' => strtoupper($this->nama_ketua_angkatan),
            'jenis_kelamin' => $this->jenis_kelamin,
            'nomor_handphone' => $this->nomor_handphone,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
            'username' => $username,
            'password' => password_hash($username, PASSWORD_DEFAULT)
        ]);

        $this->emit('stored');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.daftar-ketua-angkatan.create',[
            'dataTahun' => TahunAkademik::orderBy('tahun', 'ASC')->get()
        ]);
    }
}
