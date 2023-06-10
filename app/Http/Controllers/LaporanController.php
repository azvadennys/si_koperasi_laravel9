<?php

namespace App\Http\Controllers;

use App\Exports\AnggotaExport;
use App\Exports\PinjamanExport;
use App\Exports\SimpananExport;
use App\Models\AnggotaModel;
use App\Models\PinjamanModel;
use App\Models\SimpananWajibModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function indexsimpanan()
    {
        $tahun = SimpananWajibModel::select(DB::raw('YEAR(tanggal) as year'))->groupBy(DB::raw('YEAR(tanggal)'))->get();

        // dd($tahun);
        $data = [
            'akun' => AnggotaModel::with('simpananpokok', 'simpananwajib', 'simpanankhusus', 'pengambilan')->orderby('nama', 'asc')->get(),
            'tahun' => $tahun,
        ];
        // dd($data['akun']);
        return view('admin.laporan.indexsimpanan', $data);
    }
    public function indexpinjaman()
    {

        $data = [
            'akun' => PinjamanModel::join('tb_anggota', 'tb_anggota.id', '=', 'tb_pinjaman.id_anggota')
                ->orderBy('tb_anggota.nama', 'asc')
                ->select('tb_pinjaman.*')->get(),
        ];
        // dd($data['akun']);
        return view('admin.laporan.indexpinjaman', $data);
    }
    public function indexsimpananexcel($id)
    {
        return Excel::download(new SimpananExport($id), 'Laporan Simpanan Tahun ' . $id . '.xlsx');
    }

    public function indexpinjamanexcel($jenis)
    {
        return Excel::download(new PinjamanExport($jenis), 'Laporan Pinjaman Koperasi (' . $jenis . ').xlsx');
    }

    public function indexanggotaexcel()
    {
        return Excel::download(new AnggotaExport, 'Laporan Anggota Koperasi.xlsx');
    }
}
