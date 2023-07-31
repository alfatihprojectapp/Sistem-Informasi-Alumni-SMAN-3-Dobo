<?php

namespace App\Http\Livewire\Dashboard\Laporan;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $idDelete;

    public function mount($siswa)
    {
        $this->idDelete = $siswa;
    }

    public function destroy($id)
    {
        $siswa = Siswa::where('id_siswa', $id)->first();

        User::destroy('id', $siswa->user->id);

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

        Siswa::destroy('id_siswa', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.laporan.delete');
    }
}
