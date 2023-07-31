@extends('layouts.app')

@section('container')
    <?php if(Request::is('/')) : ?>
    @livewire('beranda')

    <?php elseif(Request::is('informasi')) : ?>
    @livewire('informasi')

    <?php elseif(Request::is('login')) : ?>
    @livewire('login')

    <?php elseif(Request::is('registrasi')) : ?>
    @livewire('registrasi')

    <?php endif ?>
@endsection
