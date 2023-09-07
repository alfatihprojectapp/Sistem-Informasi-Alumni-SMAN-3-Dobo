<?php

namespace App\Http\Livewire\Dashboard\TahunAkademik;

use App\Models\TahunAkademik;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $tahun_akademik;
    public $idDelete;


    public function mount($tahun)
    {
        $data = TahunAkademik::where('id_tahun', $tahun)->first();
        $this->tahun_akademik = $data->tahun;
        $this->idDelete = $data->id_tahun;
    }

    public function destroy($id)
    {
        $tahun = TahunAkademik::where('id_tahun', $id)->first();

        if ($tahun->user) {
            DB::table('users')->where('id_tahun', '=', $id)->delete();
        }

        if ($tahun->alumni->count() > 0) {
            foreach ($tahun->alumni as $data) {
                DB::table('alumni')->where('id_alumni', '=', $data->id_alumni)->delete();
            }
        }


        TahunAkademik::destroy('id_tahun', $id);

        $this->emit('deleted');


        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.tahun-akademik.delete');
    }
}
