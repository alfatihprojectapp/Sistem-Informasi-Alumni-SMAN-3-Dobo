<?php

namespace App\Http\Livewire\Dashboard\Laporan;

use App\Models\TahunPendaftaran;
use Livewire\Component;

class PilihTahun extends Component
{
    public $closeModal = false;

    public $kode_jurusan;
    public $nama_jurusan;

    public $idEdit;


    public function mount($jurusan)
    {
        $this->kode_jurusan = $jurusan['kode_jurusan'];
        $this->nama_jurusan = $jurusan['nama_jurusan'];

        $this->idEdit = $jurusan['id_jurusan'];
    }

    public function render()
    {
        return view('livewire.dashboard.laporan.pilih-tahun', [
            'tahun' => TahunPendaftaran::orderBy('id_tahun', 'DESC')->get()
        ]);
    }
}
