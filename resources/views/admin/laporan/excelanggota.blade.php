<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <td colspan="7" align="center">
                    <h4>DAFTAR ANGGOTA</h4>
                </td>
            </tr>
            <tr>
                <td colspan="7" align="center">
                    <h4>KOPERASI PEGAWAI NEGERI DINAS PEKERJAAN UMUM PROVINSI BENGKULU</h4>
                </td>
            </tr>
        </thead>
    </table>
    <table>
        <thead>
            <tr class="text-center">
                <th align="center">NO</th>
                <th align="center">NAMA / NIP</th>
                <th align="center">UNIT KERJA</th>
                <th align="center">TANGGAL DAFTAR</th>
                <th align="center">NO TELEPON</th>
                <th align="center">ALAMAT</th>
                <th align="center">STATUS</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($akun as $index)
            <tr class="text-center">
                <td align="center">
                    {{ $no++ }}
                </td>
                <td align="center">
                    {{ $index->nama }}<br>NIP {{ $index->nip }}
                </td>
                <td align="center">
                    {{ $index->unit_kerja }}
                </td>
                <td align="center">
                    {{ date("d M Y", strtotime($index->tanggal)) }}
                </td>
                <td align="center">
                    {{ $index->no_telepon }}
                </td>
                <td align="center">
                    {{ $index->alamat }}
                </td>
                <td align="center">
                    {{ $index->status }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>