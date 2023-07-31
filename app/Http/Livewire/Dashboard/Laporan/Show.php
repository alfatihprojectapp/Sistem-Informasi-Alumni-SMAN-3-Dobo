<?php

namespace App\Http\Livewire\Dashboard\Laporan;

use App\Models\Jurusan;
use App\Models\Siswa;
use Livewire\Component;

class Show extends Component
{
    public $closeModal = false;

    public $jurusan;
    public $nisn;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $agama;
    public $jenis_kelamin;
    public $asal_sekolah;
    public $nomor_telepon;
    public $alamat;

    public $nama_ayah;
    public $nama_ibu;
    public $alamat_ortu;
    public $telepon_ortu;

    public $idEdit;

    public $foto;
    public $kartu_keluarga;
    public $akta_kelahiran;
    public $ijazah;
    public $kip;

    public $siswa;

    public function mount($siswa)
    {
        $get_siswa = Siswa::where('id_siswa', $siswa['id_siswa'])->first();

        $this->jurusan = $get_siswa->jurusan->nama_jurusan;
        $this->nisn  = $siswa['nisn'];
        $this->nama = $siswa['nama'];
        $this->tempat_lahir = $siswa['tempat_lahir'];
        $this->tanggal_lahir = $siswa['tanggal_lahir'];
        $this->agama = $siswa['agama'];
        $this->jenis_kelamin = $siswa['jenis_kelamin'];
        $this->asal_sekolah = $siswa['asal_sekolah'];
        $this->nomor_telepon = $siswa['nomor_telepon'];
        $this->alamat = $siswa['alamat'];

        $this->nama_ayah = $siswa['nama_ayah'];
        $this->nama_ibu = $siswa['nama_ibu'];
        $this->alamat_ortu = $siswa['alamat_ortu_wali'];
        $this->telepon_ortu = $siswa['nomor_ortu_wali'];

        $this->foto = $siswa['foto'];
        $this->kartu_keluarga = $siswa['kartu_keluarga'];
        $this->akta_kelahiran = $siswa['akta_kelahiran'];
        $this->ijazah = $siswa['ijazah'];
        $this->kip = $siswa['kartu_kip'];

        $this->idEdit = $siswa['id_siswa'];
    }

    public function render()
    {
        return view('livewire.dashboard.laporan.show');
    }
}
