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
                <td colspan="8" align="center">
                    <h4>DAFTAR SIMPANAN ANGGOTA</h4>
                </td>
            </tr>
            <tr>
                <td colspan="8" align="center">
                    <h4>KOPERASI PEGAWAI NEGERI DINAS PEKERJAAN UMUM PROVINSI BENGKULU</h4>
                </td>
            </tr>
            <tr>
                <td colspan="8" align="center">
                    <h4>(SIMPANAN POKOK- SIMPANAN WAJIB -SIMPANAN KHUSUS/SUKARELA)</h4>
                </td>
            </tr>
            <tr>
                <td colspan="8" align="center">
                    <h4>TAHUN BUKU {{ $tahun }}</h4>
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
                <th align="center">SIMPANAN S/D DESEMBER {{ $tahun -1 }}</th>
                <th align="center">SIMPANAN POKOK</th>
                <th align="center">SIMPANAN WAJIB</th>
                <th align="center">SIMPANAN KHUSUS</th>
                <th align="center">TOTAL SIMPANAN</th>
            </tr>
        </thead>
        <tbody>
            @php
            $tahunsebelum = $tahun-1;
            $indexke = 0;
            $no = 1;
            @endphp
            @foreach ($akun as $index)
            @php
            $totalsimpanan = 0;
            $wajib = $index->simpananwajib->sum('jumlah');
            $pokok = $index->simpananpokok->sum('jumlah');
            $khusus = $index->simpanankhusus->sum('jumlah');

            $totalsimpanan += $wajib;
            $totalsimpanan += $pokok;
            $totalsimpanan += $khusus;

            $totalsimpanansebelum = 0;
            $wajibsebelum = $akunsebelum[$indexke]->simpananwajib->sum('jumlah');

            $pokoksebelum = $akunsebelum[$indexke]->simpananpokok->sum('jumlah');

            $khusussebelum = $akunsebelum[$indexke]->simpanankhusus->sum('jumlah');

            $totalsimpanansebelum += $wajibsebelum;
            $totalsimpanansebelum += $pokoksebelum;
            $totalsimpanansebelum += $khusussebelum;
            $indexke++;
            @endphp
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
                <td align="right">
                    {{ 'Rp ' . number_format($totalsimpanansebelum, 0, ',', '.') }}
                </td>
                <td align="right">
                    {{ 'Rp ' . number_format($wajib, 0, ',', '.') }}
                </td>
                <td align="right">
                    {{ 'Rp ' . number_format($pokok, 0, ',', '.') }}
                </td>
                <td align="right">
                    {{ 'Rp ' . number_format($khusus, 0, ',', '.') }}
                </td>
                <td align="right">
                    {{ 'Rp ' . number_format($totalsimpanan + $totalsimpanansebelum, 0, ',', '.')}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>