<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $admin;
    public $nama;
    public $idDelete;


    public function mount($user)
    {
        $data = User::where('id', $user)->first();

        $this->admin = $data->admin;
        $this->nama = $data->nama;
        $this->idDelete = $user;
    }

    public function destroy($id)
    {
        $siswa = Siswa::where('id', $id)->first();

        if ($siswa) {
            if ($siswa->foto) {
                Storage::delete($siswa->foto);
            }
            if ($siswa->kartu_keluarga) {
                Storage::delete($siswa->kartu_keluarga);
            }
            if ($siswa->akta_kelahiran) {
                Storage::delete($siswa->akta_kelahiran);
            }
            if ($siswa->ijazah) {
                Storage::delete($siswa->ijazah);
            }

            DB::table('siswa')->where('id_siswa', '=', $siswa->id_siswa)->delete();
        }

        User::destroy('id', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.user.delete');
    }
}
