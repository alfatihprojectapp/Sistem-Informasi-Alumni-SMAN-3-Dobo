<?php

namespace App\Http\Livewire\Dashboard\Finish;

use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{

    public function finish($id)
    {
        $siswa = Siswa::where('id_siswa', $id)->first();
        if (
            $siswa->id_jurusan == '' ||  $siswa->nisn == '' ||  $siswa->nama == ''
            || $siswa->tempat_lahir == '' || $siswa->tanggal_lahir == '' || $siswa->agama == ''
            || $siswa->jenis_kelamin == '' || $siswa->asal_sekolah == '' || $siswa->nomor_telepon == ''
            || $siswa->alamat == ''

            || $siswa->nama_ayah == '' || $siswa->nama_ibu == '' || $siswa->alamat_ortu_wali == '' || $siswa->nomor_ortu_wali == ''

            || $siswa->foto == '' || $siswa->kartu_keluarga == '' || $siswa->akta_kelahiran == ''
            || $siswa->ijazah == ''
        ) {
            session()->flash('error');
        } else {
            Siswa::where('id_siswa', $siswa->id_siswa)
                ->update([
                    'completed' => 1
                ]);

            session()->flash('message');
        }
    }

    public function handleFinished()
    {
    }

    public function handleBatal()
    {
    }

    public function batal($id)
    {
        Siswa::where('id_siswa', $id)
            ->update([
                'completed' => 0
            ]);

        session()->flash('batal');
    }

    public function render()
    {
        $user = auth()->user();

        return view('livewire.dashboard.finish.index', [
            'title' => 'Pendaftaran Selesai',
            'icon' => '<i class="bi bi-bookmark-check"></i>',
            'title_page' => 'Pendaftaran Selesai',
            'siswa' => $user->siswa,
            'openRegister' => \App\Models\TahunPendaftaran::where('is_actived', 1)->count()
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
