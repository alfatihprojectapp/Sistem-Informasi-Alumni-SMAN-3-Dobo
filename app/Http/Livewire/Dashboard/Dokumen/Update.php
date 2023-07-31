<?php

namespace App\Http\Livewire\Dashboard\Dokumen;

use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $closeModal = false;

    // data request
    public $image;
    public $kartu_keluarga;
    public $akta_kelahiran;
    public $ijazah;
    public $kip;

    public $idEdit;
    public $image_old;
    public $kartu_keluarga_old;
    public $akta_kelahiran_old;
    public $ijazah_old;
    public $kip_old;


    public function mount($siswa)
    {
        $this->image_old = $siswa['foto'];
        $this->kartu_keluarga_old = $siswa['kartu_keluarga'];
        $this->akta_kelahiran_old = $siswa['akta_kelahiran'];
        $this->ijazah_old = $siswa['ijazah'];
        $this->kip_old = $siswa['kartu_kip'];

        $this->idEdit = $siswa['id_siswa'];
    }

    public function update($id)
    {
        $siswa = Siswa::where('id_siswa', $id)->first();

        $rules = [];

        // validasi image
        if ($this->image_old == null) {
            $rules['image'] = 'required|image|max:1024';
        } else if ($this->image_old && !$this->image) {
            $rules['image'] = '';
        } else if ($this->image_old && $this->image) {
            $rules['image'] = 'image|max:1024';
        }
        // validasi kartu keluarga
        if ($this->kartu_keluarga_old == null) {
            $rules['kartu_keluarga'] = 'required|mimes:pdf|file|max:1024';
        } else if ($this->kartu_keluarga_old && !$this->kartu_keluarga) {
            $rules['kartu_keluarga'] = '';
        } else if ($this->kartu_keluarga_old && $this->kartu_keluarga) {
            $rules['kartu_keluarga'] = 'mimes:pdf|file|max:1024';
        }
        // validasi akta kelahiran
        if ($this->akta_kelahiran_old == null) {
            $rules['akta_kelahiran'] = 'required|mimes:pdf|file|max:1024';
        } else if ($this->akta_kelahiran_old && !$this->akta_kelahiran) {
            $rules['akta_kelahiran'] = '';
        } else if ($this->akta_kelahiran_old && $this->akta_kelahiran) {
            $rules['akta_kelahiran'] = 'mimes:pdf|file|max:1024';
        }
        // validasi ijazah
        if ($this->ijazah_old == null) {
            $rules['ijazah'] = 'required|mimes:pdf|file|max:1024';
        } else if ($this->ijazah_old && !$this->ijazah) {
            $rules['ijazah'] = '';
        } else if ($this->ijazah_old && $this->ijazah) {
            $rules['ijazah'] = 'mimes:pdf|file|max:1024';
        }

        // validasi kip
        if ($this->kip) {
            $rules['kip'] = 'mimes:pdf|file|max:1024';
        } else if ($this->kip_old && !$this->kip) {
            $rules['kip'] = '';
        } else if ($this->kip_old && $this->kip) {
            $rules['kip'] = 'mimes:pdf|file|max:1024';
        }

        $this->validate($rules);

        // foto
        if ($this->image) {
            if ($this->image_old) {
                Storage::delete($this->image_old);
            }
            $fileNameImage = $this->image->store('image');
        } else {
            $fileNameImage = $siswa->foto;
        }
        // kartu keluarga
        if ($this->kartu_keluarga) {
            if ($this->kartu_keluarga_old) {
                Storage::delete($this->kartu_keluarga_old);
            }
            $fileNameKartuKeluarga = $this->kartu_keluarga->store('kartu-keluarga');
        } else {
            $fileNameKartuKeluarga = $siswa->kartu_keluarga;
        }
        // akta kelahiran
        if ($this->akta_kelahiran) {
            if ($this->akta_kelahiran_old) {
                Storage::delete($this->akta_kelahiran_old);
            }
            $fileNameAktaKelahiran = $this->akta_kelahiran->store('akta-kelahiran');
        } else {
            $fileNameAktaKelahiran = $siswa->akta_kelahiran;
        }

        // ijazah
        if ($this->ijazah) {
            if ($this->ijazah_old) {
                Storage::delete($this->ijazah_old);
            }
            $fileNameIjazah = $this->ijazah->store('ijazah');
        } else {
            $fileNameIjazah = $siswa->ijazah;
        }

        // kip
        if ($this->kip) {
            if ($this->kip_old) {
                Storage::delete($this->kip_old);
            }
            $fileNamekip = $this->kip->store('kip');
        } else {
            $fileNamekip = $siswa->kip;
        }

        Siswa::where('id_siswa', $id)->update([
            'foto' => $fileNameImage,
            'kartu_keluarga' => $fileNameKartuKeluarga,
            'akta_kelahiran' => $fileNameAktaKelahiran,
            'ijazah' => $fileNameIjazah,
            'kartu_kip' => $fileNamekip,
        ]);

        $this->emit('updated');

        $this->cleanLiveWireTemp();

        $this->closeModal = true;

        session()->flash('message');
    }

    protected function cleanLiveWireTemp()
    {
        $storage = Storage::disk('public');

        foreach ($storage->allFiles('livewire-tmp') as $filePath) {
            $storage->delete($filePath);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.dokumen.update');
    }
}
