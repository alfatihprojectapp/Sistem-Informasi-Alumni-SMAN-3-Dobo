<?php

namespace App\Http\Livewire;

use App\Models\Siswa;
use App\Models\TahunPendaftaran;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class Registrasi extends Component
{

    public $nisn;
    public $nama;
    public $email;
    public $password;

    public function registrasi()
    {
        $this->validate([
            'nisn' => 'required|digits:10|unique:siswa,nisn',
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8'
        ]);

        User::create([
            'nama' => strtoupper($this->nama),
            'email' => $this->email,
            'email_verified_at'  => date('Y-m-d h:i:s'),
            // 'remember_token' => Str::random(10),
            'password' => password_hash($this->password, PASSWORD_DEFAULT)
        ]);

        $user = User::orderBy('id', 'DESC')->limit(1)->first();

        $tahun = TahunPendaftaran::where('is_actived', 1)->first();

        Siswa::create([
            'id' => $user->id,
            'id_tahun' => $tahun->id_tahun,
            'nisn' => $this->nisn,
            'nama' => strtoupper($user->nama)
        ]);

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.registrasi')->layout('index');
    }
}
