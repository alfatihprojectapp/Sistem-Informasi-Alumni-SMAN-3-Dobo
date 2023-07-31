<?php

use App\Http\Controllers\Dashboard\Laporan\Cetak;
use App\Http\Controllers\LogoutController;
use App\Http\Livewire\Beranda;
use App\Http\Livewire\Dashboard\Biodata\Index as BiodataIndex;
use App\Http\Livewire\Dashboard\Dokumen\Index as DokumenIndex;
use App\Http\Livewire\Dashboard\Finish\Index as FinishIndex;
use App\Http\Livewire\Dashboard\Index;
use App\Http\Livewire\Dashboard\Informasi\Index as InformasiIndex;
use App\Http\Livewire\Dashboard\Jurusan\Index as JurusanIndex;
use App\Http\Livewire\Dashboard\Laporan\Index as LaporanIndex;
use App\Http\Livewire\Dashboard\Profil\Index as ProfilIndex;
use App\Http\Livewire\Dashboard\TahunPendaftaran\Index as TahunPendaftaranIndex;
use App\Http\Livewire\Dashboard\User\Index as UserIndex;
use App\Http\Livewire\Informasi;
use App\Http\Livewire\Login;
use App\Http\Livewire\Registrasi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get(
//     '/link',
//     function () {
//         $target = '/home/u1572628/sub-sisipen/storage/app/public';
//         $shortcut = '/home/u1572628/public_html/sub-sisipen/storage';
//         symlink($target, $shortcut);
//     }
// );

Route::get('/', Beranda::class);

Route::get('/informasi', Informasi::class);

Route::get('/registrasi', Registrasi::class)->middleware('openRegister', 'guest');

Route::get('/login', Login::class)->middleware('guest')->name('login');

Route::controller(LogoutController::class)->group(function () {
    Route::post('/logout', 'logout');
});


// dashboard admin
Route::get('/dashboard', Index::class)->middleware('auth');

Route::get('/dashboard/master/jurusan', JurusanIndex::class)->middleware('admin');

Route::get('/dashboard/master/user', UserIndex::class)->middleware('admin');

Route::get('/dashboard/master/tahun-pendaftaran', TahunPendaftaranIndex::class)->middleware('admin');

Route::get('/dashboard/informasi', InformasiIndex::class)->middleware('auth');

Route::get('/dashboard/laporan', LaporanIndex::class)->middleware('admin');

Route::controller(Cetak::class)->group(function () {
    Route::get('/dashboard/siswa/{jurusan:kode_jurusan}/{tahun:tahun}/cetak', 'cetak')->middleware('admin');
});

Route::get('/dashboard/user/profil', ProfilIndex::class)->middleware('admin');

// dashboard siswa
Route::get('/dashboard/lengkapi/biodata', BiodataIndex::class)->middleware('siswa');
Route::get('/dashboard/lengkapi/dokumen', DokumenIndex::class)->middleware('siswa');
Route::get('/dashboard/lengkapi/finish', FinishIndex::class)->middleware('siswa');
