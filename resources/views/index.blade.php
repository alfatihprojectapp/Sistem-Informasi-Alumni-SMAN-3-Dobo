@extends('layouts.app')

@section('container')
    <?php if(Request::is('/')) : ?>
    @livewire('beranda')

    <?php elseif(Request::is('daftar-alumni')) : ?>
    @livewire('daftar-alumni')

    <?php elseif(Request::is('login')) : ?>
    @livewire('login')

    <?php endif ?>
@endsection
