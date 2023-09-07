<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Alumni;
use App\Models\TahunAkademik;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard.index', [
            'title' => 'Sistem Informasi Alumni SMA Negeri 3 Dobo | Dashboard - Beranda',
            'icon' => '<i class="bi bi-house"></i>',
            'title_page' => 'Beranda',
            'alumni' => Alumni::get(),
            'dataTahun' => TahunAkademik::orderBy('tahun', 'ASC')->get(),
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
