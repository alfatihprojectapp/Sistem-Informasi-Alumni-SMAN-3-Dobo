<?php

namespace App\Http\Livewire\Dashboard\Biodata;

use App\Models\Jurusan;
use App\Models\Siswa;
use Livewire\Component;

class Update extends Component
{
    public $closeModal = false;

    // data request
    public $jurusan;
    public $nisn;
    public $nama;
    public $tempat_lahir;
    // public $tanggal_lahir;
    public $agama;
    public $jenis_kelamin;
    public $asal_sekolah;
    public $nomor_telepon;
    public $alamat;

    public $nama_ayah;
    public $nama_ibu;
    public $alamat_orang_tua;
    public $nomor_telepon_orang_tua;

    public $tanggal;
    public $bulan;
    public $tahun;

    public $idEdit;

    public function mount($siswa)
    {
        $this->jurusan = $siswa['id_jurusan'];
        $this->nisn = $siswa['nisn'];
        $this->nama = $siswa['nama'];
        $this->tempat_lahir = $siswa['tempat_lahir'];
        $this->agama = $siswa['agama'];
        $this->jenis_kelamin = $siswa['jenis_kelamin'];
        $this->asal_sekolah = $siswa['asal_sekolah'];
        $this->nomor_telepon = $siswa['nomor_telepon'];
        $this->alamat = $siswa['alamat'];

        $this->nama_ayah = $siswa['nama_ayah'];
        $this->nama_ibu = $siswa['nama_ibu'];
        $this->nomor_telepon_orang_tua = $siswa['nomor_ortu_wali'];
        $this->alamat_orang_tua = $siswa['alamat_ortu_wali'];
        if ($siswa['tanggal_lahir']) {
            $tanggal_lahir = explode(' ', $siswa['tanggal_lahir']);
            $this->tanggal = $tanggal_lahir[0];
            $this->bulan = $tanggal_lahir[1];
            $this->tahun = $tanggal_lahir[2];
        }

        $this->idEdit = $siswa['id_siswa'];
    }

    public function update($id)
    {
        $rules = [
            'jurusan' => 'required',
            'nisn' => 'required',
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',

            'tanggal' => 'required|max:255',
            'bulan' => 'required|max:255',
            'tahun' => 'required|digits:4',

            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'asal_sekolah' => 'required|max:255',
            'nomor_telepon' => 'required|max:255',
            'alamat' => 'required|max:255',

            'nama_ayah' => 'required|max:255',
            'nama_ibu' => 'required|max:255',
            'nomor_telepon_orang_tua' => 'required|max:255',
            'alamat_orang_tua' => 'required|max:255',
        ];

        $siswa = Siswa::where('id_siswa', $id)->first();

        if ($siswa->nisn != $this->nisn) {
            $rules['nisn'] = 'digits:10|unique:siswa,nisn';
        }

        $this->validate($rules);


        Siswa::where('id_siswa', $siswa->id_siswa)
            ->update([
                'id_jurusan' => $this->jurusan,
                'nisn' => $this->nisn,
                'nama' => $this->nama,
                'tempat_lahir' => $this->tempat_lahir,
                'tanggal_lahir' => $this->tanggal . ' ' . $this->bulan . ' ' . $this->tahun,
                'agama' => $this->agama,
                'jenis_kelamin' => $this->jenis_kelamin,
                'asal_sekolah' => $this->asal_sekolah,
                'nomor_telepon' => $this->nomor_telepon,
                'alamat' => $this->alamat,

                'nama_ayah' => $this->nama_ayah,
                'nama_ibu' => $this->nama_ibu,
                'nomor_ortu_wali' => $this->nomor_telepon_orang_tua,
                'alamat_ortu_wali' => $this->alamat_orang_tua,
            ]);

        $this->emit('updated');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.biodata.update', [
            'dataJurusan' => Jurusan::orderBy('nama_jurusan')->get()
        ]);
    }
}
