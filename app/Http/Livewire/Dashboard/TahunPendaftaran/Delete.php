<?php

namespace App\Http\Livewire\Dashboard\TahunPendaftaran;

use App\Models\TahunPendaftaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $tahun_pendaftaran;
    public $idDelete;

    public function mount($tahun)
    {
        $data = TahunPendaftaran::where('id_tahun', $tahun)->first();

        $this->tahun_pendaftaran = $data->tahun;
        $this->idDelete = $tahun;
    }

    public function destroy($id)
    {
        $tahun = TahunPendaftaran::where('id_tahun', $id)->first();

        $siswa = $tahun->siswa;

        if ($siswa) {

            foreach ($siswa as $data) {
                if ($data->foto) {
                    Storage::delete($data->foto);
                }
                if ($data->kartu_keluarga) {
                    Storage::delete($data->kartu_keluarga);
                }
                if ($data->akta_kelahiran) {
                    Storage::delete($data->akta_kelahiran);
                }
                if ($data->ijazah) {
                    Storage::delete($data->ijazah);
                }

                DB::table('users')->where('id', '=', $data->user->id)->delete();
                DB::table('siswa')->where('id_siswa', '=', $data->id_siswa)->delete();
            }
        }

        TahunPendaftaran::destroy('id_tahun', $id);

        $this->emit('deleted');


        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.tahun-pendaftaran.delete');
    }
}
