<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireDelete = false;

    public $paginate = 15;
    public $search;

    public $getUser;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored' => 'handleStored',
        'deleted' => 'handleDeleted',

        'closeLivewire' => 'handleCloseLivewire'
    ];

    // create
    public function create()
    {
        $this->showLivewireCreate = true;
    }
    public function handleStored()
    {
        $this->showLivewireCreate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $user = User::where('id', $id)->first();

        $this->getUser = $user->id;
    }
    public function handleDeleted()
    {
        $this->showLivewireDelete = false;
    }

    public function handleCloseLivewire()
    {
        $this->showLivewireCreate = false;
        $this->showLivewireDelete = false;
    }

    public function render()
    {
        return view('livewire.dashboard.user.index', [
            'title' => 'Daftar User',
            'icon' => '<i class="bi bi-people"></i>',
            'title_page' => 'Daftar User',
            'auth' => auth()->user(),
            'user' => $this->search == null ?
                User::orderBy('admin', 'DESC')->paginate($this->paginate) :
                User::where('nama', 'like', '%' . $this->search . '%')->orderBy('admin', 'DESC')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
