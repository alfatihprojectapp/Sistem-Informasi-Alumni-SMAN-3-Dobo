<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/cetak.css" rel="stylesheet">

    <title>{{ $title }}</title>
</head>

<body>

    <div class="header">
        <table>
            <tr>
                <td>
                    <img src="assets/img/logo.png" alt="logo">
                </td>
                <td>
                    <p>PEMERINTAH KABUPATEN BURU</p>
                    <p>DINAS PENDIDIKAN</p>
                    <P>SMA NEGERI 8 BURU</P>
                    <p style="font-size:10pt;line-height: 15px;">
                        <i>Jl. Baru, Desa Waplau, Kec. Waplau, Kab. Buru,
                            Prov. Maluku
                        </i>
                    </p>
                </td>
                <td>
                    {{-- <img src="assets/img/logo.png" alt="logo"> --}}
                </td>
            </tr>
        </table>
    </div>

    <div class="line"></div>

    <div class="title">
        <p>
            DATA PENDAFTARAN SISWA BARU <br>JURUSAN {{ strtoupper($jurusan) }}
            TAHUN {{ $tahun_pendaftaran }}
        </p>
    </div>

    <table width="100%" cellspacing="0" style="font-size: 10pt;">
        <thead style="background-color: lightcyan;font-size: 10pt;">
            <tr>
                <th>No.</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Asal Sekolah</th>
                <th>Alamat Tinggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nisn }}</td>
                    <td style="width: 180px;">{{ strtoupper($data->nama) }}</td>
                    <td>{{ $data->tempat_lahir }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->asal_sekolah }}</td>
                    <td>{{ $data->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
