<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use App\Models\AngsuranModel;
use App\Models\PinjamanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'akun' => PinjamanModel::orderby('tanggal', 'asc')->paginate(15),
        ];
        return view('admin.peminjaman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'anggota' => AnggotaModel::all(),
        ];
        return view('admin.peminjaman.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PinjamanModel::insert(
            [
                'id_anggota' => $request->id_anggota,
                'sumber_dana' => $request->sumber_dana,
                'tanggal' => $request->tanggal,
                'lama_peminjaman' => $request->lama_peminjaman,
                'jumlah' => $request->jumlah,
                'bunga_perbulan' => $request->bunga,
                'created_at' => now(),
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeriodeModel  $periodeModel
     * @return \Illuminate\Http\Response
     */
    public function show(PinjamanModel $periodeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeriodeModel  $periodeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PinjamanModel $periodeModel, $id)
    {
        $data = [
            'data' => PinjamanModel::find($id),
        ];
        return view('admin.peminjaman.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeriodeModel  $periodeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PinjamanModel $periodeModel, $id)
    {
        DB::table('tb_periode')->where('id', $id)->update(
            [
                'nama' => $request->nama,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'status' => $request->status,
                'updated_at' => now()
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Ubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeriodeModel  $periodeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PinjamanModel $periodeModel, $id)
    {
        AngsuranModel::where('id_pinjaman', $id)->delete();
        PinjamanModel::where('id', $id)->delete();
        return redirect()->back()->withSuccess('Berhasil Hapus Data');
    }
    public function bayar(PinjamanModel $periodeModel, $id)
    {
        $data = [

            'peminjaman' => PinjamanModel::where('id', $id)->first(),
        ];

        return view('admin.peminjaman.bayar', $data);
    }
    public function bayarstore(Request $request, PinjamanModel $periodeModel, $id)
    {
        AngsuranModel::insert(
            [
                'id_pinjaman' => $id,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
                'created_at' => now(),
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }
}
