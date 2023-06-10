<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use App\Models\SimpananKhususModel;
use App\Models\SimpananPengambilanModel;
use App\Models\SimpananPokokModel;
use App\Models\SimpananWajibModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'akun' => AnggotaModel::with('simpananpokok', 'simpananwajib', 'simpanankhusus', 'pengambilan')->orderby('nama', 'asc')->get(),
        ];
        // dd($data['akun']);
        return view('admin.simpanan.index', $data);
    }
    public function indexpokok()
    {
        $data = [
            'akun' => SimpananPokokModel::orderby('tanggal', 'desc')->get(),
        ];
        return view('admin.simpananpokok.index', $data);
    }
    public function indexwajib()
    {
        $data = [
            'akun' => SimpananWajibModel::orderby('tanggal', 'desc')->get(),
        ];
        return view('admin.simpananwajib.index', $data);
    }
    public function indexkhusus()
    {
        $data = [
            'akun' => SimpananKhususModel::orderby('tanggal', 'desc')->get(),
        ];
        return view('admin.simpanankhusus.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function createpokok()
    {
        $data = [
            'anggota' => AnggotaModel::orderby('nama', 'asc')->get(),
        ];
        return view('admin.simpananpokok.tambah', $data);
    }
    public function createwajib()
    {
        $data = [
            'anggota' => AnggotaModel::orderby('nama', 'asc')->get(),
        ];
        return view('admin.simpananwajib.tambah', $data);
    }
    public function createkhusus()
    {
        $data = [
            'anggota' => AnggotaModel::orderby('nama', 'asc')->get(),
        ];

        return view('admin.simpanankhusus.tambah', $data);
    }
    public function pengambilan($id)
    {
        $index = AnggotaModel::with('simpananpokok', 'simpananwajib', 'simpanankhusus', 'pengambilan')->where('id', $id)->first();
        $totalsimpanan = 0;
        $wajib = $index->simpananwajib->sum('jumlah');
        $pokok = $index->simpananpokok->sum('jumlah');
        $khusus = $index->simpanankhusus->sum('jumlah');
        $pengambilan = $index->pengambilan->sum('jumlah');

        $totalsimpanan += $wajib += $pokok += $khusus -= $pengambilan;
        // dd($totalsimpanan);
        $data = [
            'anggota' => AnggotaModel::where('id', $id)->first(),
            'totalsimpanan' => $totalsimpanan,
        ];

        return view('admin.simpanan.pengambilan', $data);
    }
    public function storepengambilan(Request $request, $id)
    {
        SimpananPengambilanModel::insert(
            [
                'id_anggota' => $id,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
                'created_at' => now(),
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function storepokok(Request $request)
    {
        SimpananPokokModel::insert(
            [
                'id_anggota' => $request->id_anggota,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
                'created_at' => now(),
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }
    public function storewajib(Request $request)
    {
        SimpananWajibModel::insert(
            [
                'id_anggota' => $request->id_anggota,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
                'created_at' => now(),
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }
    public function storekhusus(Request $request)
    {
        SimpananKhususModel::insert(
            [
                'id_anggota' => $request->id_anggota,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
                'created_at' => now(),
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimpananWajibModel  $simpananWajibModel
     * @return \Illuminate\Http\Response
     */
    public function show(SimpananWajibModel $simpananWajibModel, $id)
    {
        // $simpananWajib = DB::table('tb_simpanan_wajib')
        //     ->select('tanggal', DB::raw("'wajib' AS jenis_simpanan"), 'tanggal', 'jumlah', 'id');

        // $simpananPokok = DB::table('tb_simpanan_pokok')
        //     ->select('tanggal', DB::raw("'pokok' AS jenis_simpanan"), 'tanggal', 'jumlah', 'id');

        // $simpananKhusus = DB::table('tb_simpanan_khusus')
        //     ->select('tanggal', DB::raw("'khusus' AS jenis_simpanan"), 'tanggal', 'jumlah', 'id');

        // $gabunganSimpanan = $simpananWajib
        //     ->unionAll($simpananPokok)
        //     ->unionAll($simpananKhusus)
        //     ->where('id_anggota', $id)
        //     ->orderBy('tanggal', 'ASC')
        //     ->get();

        $data = [
            'akun' => AnggotaModel::with(['simpananpokok' => function ($query) {
                $query->orderBy('tanggal', 'DESC');
            }, 'simpananwajib' => function ($query) {
                $query->orderBy('tanggal', 'DESC');
            }, 'simpanankhusus' => function ($query) {
                $query->orderBy('tanggal', 'DESC');
            }, 'pengambilan' => function ($query) {
                $query->orderBy('tanggal', 'DESC');
            }])->where('id', $id)->first(),
        ];
        // dd($data['akun']);
        return view('admin.simpanan.detail', $data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimpananWajibModel  $simpananWajibModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SimpananWajibModel $simpananWajibModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SimpananWajibModel  $simpananWajibModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimpananWajibModel $simpananWajibModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimpananWajibModel  $simpananWajibModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpananWajibModel $simpananWajibModel)
    {
        //
    }
    public function destroypokok(SimpananWajibModel $simpananWajibModel, $id)
    {
        SimpananPokokModel::where('id', $id)->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus Data');
    }
    public function destroywajib(SimpananWajibModel $simpananWajibModel, $id)
    {
        SimpananWajibModel::where('id', $id)->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus Data');
    }
    public function destroykhusus(SimpananWajibModel $simpananWajibModel, $id)
    {
        SimpananKhususModel::where('id', $id)->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus Data');
    }
}
