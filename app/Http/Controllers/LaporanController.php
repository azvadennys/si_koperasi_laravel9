<?php

namespace App\Http\Controllers;

use App\Exports\SimpananExport;
use App\Models\AnggotaModel;
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
            'akun' => AnggotaModel::with('simpananpokok', 'simpananwajib', 'simpanankhusus')->orderby('nama', 'asc')->paginate(15),
            'tahun' => $tahun,
        ];
        // dd($data['akun']);
        return view('admin.laporan.indexsimpanan', $data);
    }
    public function indexpinjaman()
    {
        $data = [
            'akun' => AnggotaModel::with('simpananpokok', 'simpananwajib', 'simpanankhusus')->orderby('nama', 'asc')->paginate(15),
        ];
        // dd($data['akun']);
        return view('admin.laporan.indexsimpanan', $data);
    }
    public function indexsimpananexcel($id)
    {
        // dd($id);
        return Excel::download(new SimpananExport($id), 'Simpanan Tahun ' . $id . '.xlsx');
    }
}
