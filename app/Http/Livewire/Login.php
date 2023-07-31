<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class Login extends Component
{
    public $email;
    public $password;
    public $remember_me = false;

    protected $listeners = [
        'error'
    ];


    public function auth(Request $request)
    {

        $remember_me = $this->remember_me ? true : false;

        $validateData =  $this->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validateData, $remember_me)) {
            session()->regenerate();

            return redirect()->intended('/dashboard')->with('message', 'success/Login Berhasil');
        }

        $this->emit('error');

        return back()->with('message', 'error/Login gagal');
    }

    public function error()
    {
    }

    public function render()
    {
        return view('livewire.login')->layout('index');
    }
}
