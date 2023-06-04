<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use App\Models\SimpananKhususModel;
use App\Models\SimpananPokokModel;
use App\Models\SimpananWajibModel;
use Illuminate\Http\Request;

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
            'akun' => AnggotaModel::with('simpananpokok', 'simpananwajib', 'simpanankhusus')->orderby('nama', 'asc')->paginate(15),
        ];
        // dd($data['akun']);
        return view('admin.simpanan.index', $data);
    }
    public function indexpokok()
    {
        $data = [
            'akun' => SimpananPokokModel::orderby('tanggal', 'desc')->paginate(15),
        ];
        return view('admin.simpananpokok.index', $data);
    }
    public function indexwajib()
    {
        $data = [
            'akun' => SimpananWajibModel::orderby('tanggal', 'desc')->paginate(15),
        ];
        return view('admin.simpananwajib.index', $data);
    }
    public function indexkhusus()
    {
        $data = [
            'akun' => SimpananKhususModel::orderby('tanggal', 'desc')->paginate(15),
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
            'anggota' => AnggotaModel::all(),
        ];
        return view('admin.simpananpokok.tambah', $data);
    }
    public function createwajib()
    {
        $data = [
            'anggota' => AnggotaModel::all(),
        ];
        return view('admin.simpananwajib.tambah', $data);
    }
    public function createkhusus()
    {
        $data = [
            'anggota' => AnggotaModel::all(),
        ];
        return view('admin.simpanankhusus.tambah', $data);
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
    public function show(SimpananWajibModel $simpananWajibModel)
    {
        //
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
