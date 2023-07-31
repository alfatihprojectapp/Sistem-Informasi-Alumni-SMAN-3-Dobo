<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Informasi;
use App\Models\Jurusan;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard.index', [
            'icon' => '<i class="bi bi-layout-text-sidebar-reverse"></i>',
            'title_page' => 'Dashboard',
            'jurusan' => Jurusan::orderBy('nama_jurusan')->get(),
            'informasi' => Informasi::orderBy('id_informasi', 'DESC')->limit(2)->get()
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
