<?php

namespace App\Http\Controllers;

use App\Models\tb_supir;
use App\Http\Requests\Storetb_supirRequest;
use App\Http\Requests\Updatetb_supirRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TbSupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'supir' => tb_supir::orderby('Nama_Supir', 'ASC')->paginate(15),
        ];
        return view('admin.supir.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supir.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storetb_supirRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_supir')->insert(
            [
                'Nama_Supir' => $request->Nama_Supir,
                'Alamat' => $request->Alamat,
                'Jenis_Kelamin' => $request->Jenis_Kelamin,
                'No_Telepon' => $request->No_Telepon,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_supir  $tb_supir
     * @return \Illuminate\Http\Response
     */
    public function show(tb_supir $tb_supir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_supir  $tb_supir
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_supir $tb_supir, $id)
    {
        $data = [
            'data' => tb_supir::find($id),
        ];
        return view('admin.supir.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetb_supirRequest  $request
     * @param  \App\Models\tb_supir  $tb_supir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_supir $tb_supir, $id)
    {
        DB::table('tb_supir')->where('id', $id)->update(
            [
                'Nama_Supir' => $request->Nama_Supir,
                'Alamat' => $request->Alamat,
                'Jenis_Kelamin' => $request->Jenis_Kelamin,
                'No_Telepon' => $request->No_Telepon,
            ]
        );
        return redirect()->back()->withSuccess('Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_supir  $tb_supir
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_supir $tb_supir, $id)
    {
        tb_supir::find($id)->delete();

        return redirect()->back()->withSuccess('Berhasil Menghapus Data');
    }
}
