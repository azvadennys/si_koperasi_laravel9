<?php

namespace App\Http\Controllers;

use App\Models\PeriodeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'akun' => PeriodeModel::orderby('status', 'asc')->get(),
        ];
        return view('admin.periode.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.periode.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_periode')->insert(
            [
                'nama' => $request->nama,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'status' => $request->status,
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
    public function show(PeriodeModel $periodeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeriodeModel  $periodeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PeriodeModel $periodeModel, $id)
    {
        $data = [
            'data' => PeriodeModel::find($id),
        ];
        return view('admin.periode.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeriodeModel  $periodeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeriodeModel $periodeModel, $id)
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
    public function destroy(PeriodeModel $periodeModel)
    {
        //
    }
}
