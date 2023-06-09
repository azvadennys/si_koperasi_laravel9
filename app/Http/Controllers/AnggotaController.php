<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'akun' => AnggotaModel::orderby('nama', 'asc')->get(),
        ];
        return view('admin.anggota.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.anggota.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_anggota')->insert(
            [
                'nama' => $request->nama,
                'nip' => $request->nip,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'tanggal' => $request->tanggal,
                'unit_kerja' => $request->unit_kerja,
                'status' => $request->status,
                'created_at' => now(),
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggotaModel  $anggotaModel
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaModel $anggotaModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaModel  $anggotaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggotaModel $anggotaModel, $id)
    {
        $data = [
            'data' => AnggotaModel::find($id),
        ];
        return view('admin.anggota.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaModel  $anggotaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggotaModel $anggotaModel, $id)
    {
        DB::table('tb_anggota')->where('id', $id)->update(
            [
                'nama' => $request->nama,
                'nip' => $request->nip,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'tanggal' => $request->tanggal,
                'unit_kerja' => $request->unit_kerja,
                'status' => $request->status,
                'updated_at' => now()
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Ubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaModel  $anggotaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggotaModel $anggotaModel, $id)
    {
        AnggotaModel::find($id)->delete();

        return redirect()->back()->withSuccess('Berhasil Menghapus Data');
    }
}
