<?php

namespace App\Http\Livewire\Dashboard\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class Update extends Component
{
    public $closeModal = false;

    // data request
    public $nama_jurusan;
    public $idEdit;

    public function mount($jurusan)
    {
        $this->nama_jurusan = $jurusan['nama_jurusan'];

        $this->idEdit = $jurusan['id_jurusan'];
    }


    public function update($id)
    {
        $jurusan = Jurusan::where('id_jurusan', $id)->first();

        $rules = [
            'nama_jurusan' => 'required'
        ];

        if ($this->nama_jurusan != $jurusan->nama_jurusan) {
            $rules['nama_jurusan'] = 'required|max:255|unique:jurusan,nama_jurusan';
        }

        $this->validate($rules);

        Jurusan::where('id_jurusan', $id)->update([
            'nama_jurusan' => $this->nama_jurusan
        ]);

        $this->emit('updated');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.jurusan.update');
    }
}
