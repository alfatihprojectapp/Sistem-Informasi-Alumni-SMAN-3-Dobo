<?php

namespace App\Http\Livewire\Dashboard\Jurusan;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $nama_jurusan;
    public $idDelete;


    public function mount($jurusan)
    {
        $data = Jurusan::where('id_jurusan', $jurusan)->first();
        $this->nama_jurusan = $data->nama_jurusan;
        $this->idDelete = $jurusan;
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::where('id_jurusan', $id)->first();

        $siswa = $jurusan->siswa;

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

        Jurusan::destroy('id_jurusan', $id);

        $this->emit('deleted');


        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.jurusan.delete');
    }
}
