<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LogoutController;
use App\Http\Livewire\Beranda;
use App\Http\Livewire\DaftarAlumni;
use App\Http\Livewire\Dashboard\Alumni\Index as AlumniIndex;
use App\Http\Livewire\Dashboard\DaftarKetuaAngkatan\Index as DaftarKetuaAngkatanIndex;
use App\Http\Livewire\Dashboard\Index;
use App\Http\Livewire\Dashboard\KetuaAngkatan\Alumni\Index as KetuaAngkatanAlumniIndex;
use App\Http\Livewire\Dashboard\Profil\Index as ProfilIndex;
use App\Http\Livewire\Dashboard\TahunAkademik\Index as TahunAkademikIndex;
use App\Http\Livewire\Dashboard\User\Index as UserIndex;
use App\Http\Livewire\Login;
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

Route::get('/daftar-alumni', DaftarAlumni::class);

Route::get('/login', Login::class)->middleware('guest')->name('login');

Route::controller(LogoutController::class)->group(function () {
    Route::post('/logout', 'logout');
});


// dashboard admin
Route::get('/dashboard/beranda', Index::class)->middleware('auth');

Route::get('/dashboard/tahun-angkatan', TahunAkademikIndex::class)->middleware('admin');

Route::get('/dashboard/daftar-ketua-angkatan', DaftarKetuaAngkatanIndex::class)->middleware('admin');

Route::get('/dashboard/daftar-alumni', AlumniIndex::class)->middleware('admin');

Route::get('/dashboard/daftar-alumni/{tahun:id_tahun}', KetuaAngkatanAlumniIndex::class)->middleware('ketang');

Route::controller(ImportController::class)->group(function(){
    Route::post('/dashboard/ketua-angkatan/import', 'importKetuaAngkatan')->middleware('admin');
    Route::post('/dashboard/alumni/import', 'importAlumni')->middleware('admin');
    Route::post('/dashboard/alumni/{tahun:id_tahun}/import', 'importAlumni2')->middleware('ketang');
});

Route::controller(ExportController::class)->group(function () {
    Route::get('/dashboard/export-daftar-ketua-angkatan/excel', 'exportKetuaAngkatan')->middleware('admin');
    Route::get('/dashboard/export-alumni/excel/{tahun:id_tahun}', 'exportAlumni')->middleware('auth');
});


Route::get('/dashboard/admin', UserIndex::class)->middleware('admin');

Route::get('/dashboard/user/profil', ProfilIndex::class)->middleware('admin');

