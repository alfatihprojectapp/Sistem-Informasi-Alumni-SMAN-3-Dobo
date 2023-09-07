<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/cetak.css" rel="stylesheet">

    <title>Daftar Ketua Angkatan</title>

    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 12.5pt;
        }

        @page {
            margin-top: 20px;
            margin-bottom: 10px;
            /* margin-left: 20px; */
            /* margin-right: 20px; */
        }
    </style>


</head>

<body>

    <h4>DAFTAR ALUMNI ANGKATAN TAHUN {{ $tahunAngkatan->tahun }}</h4>

    @if ($alumni->count() > 0 )
        <table width="100%" cellspacing="0" style="border: 1px solid black;">
            <thead>
                <tr>
                    <th style="vertical-align: middle;text-align: center;">#</th>
                    <th style="vertical-align: middle;">Nama</th>
                    <th style="vertical-align: middle;">Jenis Kelamin</th>
                    <th style="vertical-align: middle;">Nomor Handphone</th>
                    <th style="vertical-align: middle;">Pekerjaan</th>
                    <th style="vertical-align: middle;">Alamat</th>
                    <th style="vertical-align: middle;">Tahun Angkatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumni as $data)
                    <tr>
                        <td style="vertical-align: middle;text-align: center;">
                            {{ $loop->iteration }}</td>
                        <td style="vertical-align: middle;">{{ $data->nama }}</td>
                        <td style="vertical-align: middle;">{{ $data->jenis_kelamin }}</td>
                        <td style="vertical-align: middle;">{{ $data->nomor_handphone }}</td>
                        <td style="vertical-align: middle;">{{ $data->pekerjaan }}</td>
                        <td style="vertical-align: middle;">{{ $data->alamat }}</td>
                        <td style="vertical-align: middle;">{{ $data->tahun->tahun }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="height: 60vh;" class="d-flex justify-content-center align-items-center">
            <p class="text-center text-secondary">Belum ada data !
            </p>
        </div>
    @endif


</body>

</html>
