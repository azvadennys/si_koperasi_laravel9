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
                    <h4>DAFTAR PINJAMAN ANGGOTA</h4>
                </td>
            </tr>
            <tr>
                <td colspan="7" align="center">
                    <h4>KOPERASI PEGAWAI NEGERI DINAS PEKERJAAN UMUM PROVINSI BENGKULU</h4>
                </td>
            </tr>
            <tr>
                <td colspan="7" align="center">
                    <h4>SUMBER DANA {{ $jenis }}</h4>
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
                <th align="center">LAMA PINJAMAN</th>
                <th align="center">JUMLAH PINJAMAN</th>
                <th align="center">BUNGA 2%</th>
                <th align="center">JUMLAH PINJAMAN YANG HARUS DIBAYAR</th>
                <th align="center">ANGSURAN PERBULAN</th>
                <th align="center">SISA PINJAMAN S/D SAAT INI</th>
                <th align="center">ANG. TBYR. (Bln)</th>
                <th align="center">SUMBER DANA</th>
                <th align="center">KET</th>
            </tr>
        </thead>
        <tbody>
            @php

            $no = 1;
            @endphp
            @foreach ($akun as $key=> $index)
            @php
            $number = $index->jumlah / $index->lama_peminjaman + $index->bunga_perbulan;

            // Divide by 1000
            $perbulan = $number / 10;

            // Round up to the nearest integer
            $perbulan = ceil($perbulan);

            // Multiply by 1000
            $perbulan = $perbulan * 10;

            @endphp

            <tr class="text-center">
                <td align="center">
                    {{ $no++ }}
                </td>
                <td align="left">
                    {{ $index->anggota->nama }}<br>NIP {{ $index->anggota->nip }}
                </td>
                <td align="center">
                    {{ $index->anggota->unit_kerja }}
                </td>
                <td align="center">
                    {{ $index->lama_peminjaman }}
                </td>
                <td align="right">
                    {{ 'Rp ' . number_format($index->jumlah, 0, ',', '.') }}
                </td>
                <td align="right">
                    {{ 'Rp ' . number_format($index->jumlah*0.02*$index->lama_peminjaman, 0, ',', '.') }}
                </td>
                <td align="right">
                    {{ 'Rp ' . number_format($index->jumlah + ($index->jumlah*0.02*$index->lama_peminjaman), 0, ',',
                    '.') }}
                </td>
                <td align="right">
                    {{ 'Rp ' . number_format($perbulan, 0, ',', '.') }}
                </td>
                <td align="right">
                    {{ 'Rp ' . number_format(($index->jumlah + ($index->jumlah*0.02*$index->lama_peminjaman)) -
                    $index->angsuran->sum('jumlah'), 0, ',', '.') }}
                </td>
                <td align="center">
                    {{ $index->angsuran->count() }}
                </td>
                <td align="center">
                    {{ $index->sumber_dana }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>