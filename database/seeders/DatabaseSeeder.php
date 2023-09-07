<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // admin
        \App\Models\User::create([
            'nama' => 'Admin Sekolah',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            // 'remember_token' => Str::random(10),
            'admin' => 1
        ]);

        // jurusan
        \App\Models\Jurusan::create([
            'kode_jurusan' => rand(0000000, 99999999),
            'nama_jurusan' => 'Teknik Instalasi Tenaga Listrik'
        ]);
        \App\Models\Jurusan::create([
            'kode_jurusan' => rand(0000000, 99999999),
            'nama_jurusan' => 'Teknik Pengelasan'
        ]);
        \App\Models\Jurusan::create([
            'kode_jurusan' => rand(0000000, 99999999),
            'nama_jurusan' =>  'Teknik dan Bisnis Sepeda Motor'
        ]);
        \App\Models\Jurusan::create([
            'kode_jurusan' => rand(0000000, 99999999),
            'nama_jurusan' => 'Teknik Komputer dan Jaringan'
        ]);
        \App\Models\Jurusan::create([
            'kode_jurusan' => rand(0000000, 99999999),
            'nama_jurusan' => 'IPA'
        ]);
        \App\Models\Jurusan::create([
            'kode_jurusan' => rand(0000000, 99999999),
            'nama_jurusan' => 'IPS'
        ]);

        //tahun 
        \App\Models\TahunPendaftaran::create([
            'tahun' => '2021',
            'is_actived' => 0
        ]);
        \App\Models\TahunPendaftaran::create([
            'tahun' => '2022',
            'is_actived' => 0
        ]);

        // informasi
        \App\Models\Informasi::create([
            'kode_informasi' => rand(0000000, 99999999),
            'isi_informasi' => '<h4><strong>Persyaratan pendaftaran :</strong></h4>
            <ol>
            <li>Berusia paling tinggi 21 tahun pada tanggal 1 Juli tahun berjalan.</li>
            <li>Telah menyelesaikan kelas 9 SMP atau bentuk lain yang sederajat.</li>
            <li>SMK dengan bidang keahlian, program keahlian, dapat menetapkan tambahan persyaratan khusus dalam penerimaan peserta didik baru kelas 10.</li>
            <li>Persyaratan usia dikecualikan untuk sekolah yang menyelenggarakan pendidikan khusus atau pendidikan layanan khusus atau berada di daerah tertinggal, terdepan, terluar.</li>
            </ol>
            <h4><strong>Persiapan berkas :</strong></h4>
            <ol>
            <li>Kartu Keluarga (<em>Scan dalam bentuk pdf dengan ukuran maksimal 1024 kb</em>).</li>
            <li>Akta Kelahiran (<em>Scan dalam bentuk pdf dengan ukuran maksimal 1024 kb</em>).</li>
            <li>Ijazah SMP atau Surat Keterangan Lulus (<em>Scan dalam bentuk pdf dengan ukuran maksimal 1024 kb</em>).</li>
            <li>Pas Foto 4x6 Latar Biru (<em>Format file image jpg, jpeg, png dengan ukuran maksimal 1024 kb</em>).</li>
            </ol>'
        ]);

        \App\Models\Informasi::create([
            'kode_informasi' => rand(0000000, 99999999),
            'isi_informasi' => '<h4><strong>Tata Cara pendaftaran :</strong></h4>
                <ul style="list-style-type: square;">
                <li>Masuk di menu <strong>Registrsi Akun</strong> untuk membuat akun pendaftaran dengan cara sebagai berikut :</li>
                </ul>
                <ul style="list-style-type: circle;">
                <li>Masukan NISN sesuai ijazah</li>
                <li>Masukan nama sesuai ijazah</li>
                <li>Masukan email yang aktif</li>
                <li>Masukan password.</li>
                <li>Klik registrasi</li>
                </ul>
                <ul style="list-style-type: square;">
                <li>Setelah akun pendaftaran selesai dibuat, silahkan login dengan menggunakan email dan password.</li>
                <li>Setelah berhasil login, lengkapilah data pendaftaran siswa seperti biodata diri dan dokumen pendaftaran.</li>
                </ul>'
        ]);
    }
}
