<?php

namespace App\Http\Controllers;

use App\Models\tb_mobil;
use App\Http\Requests\Storetb_mobilRequest;
use App\Http\Requests\Updatetb_mobilRequest;
use Illuminate\Http\Request;

class TbMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'mobil' => tb_mobil::orderby('status', 'DESC')->paginate(15),
        ];
        return view('admin.mobil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mobil.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storetb_mobilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'id_mobil' => 'required|unique:tb_mobil',
                'status' => 'required',
            ],
            [
                'id_mobil.unique' => "Sudah ada nomor kendaraan tersebut",
                'status.required' => "Status harus diisi",
            ]
        );
        $fileName = time() . '.' . $request->file('gambar')->getClientOriginalExtension();
        $request->file('gambar')->move(public_path('storage/dokumen'), $fileName);
        tb_mobil::create([
            'id_mobil' => $request->id_mobil,
            'Merk_Mobil' => $request->Merk_Mobil,
            'Jenis_Mobil' => $request->Jenis_Mobil,
            'Tahun' => $request->Tahun,
            'Warna' => $request->Warna,
            'Harga_Sewa' => $request->Harga_Sewa,
            'gambar' => $fileName,
            'status' => $request->status,
        ])->id;
        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_mobil  $tb_mobil
     * @return \Illuminate\Http\Response
     */
    public function show(tb_mobil $tb_mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_mobil  $tb_mobil
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_mobil $tb_mobil, $id)
    {
        $data = [
            'data' => tb_mobil::find($id),
        ];
        return view('admin.mobil.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetb_mobilRequest  $request
     * @param  \App\Models\tb_mobil  $tb_mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_mobil $tb_mobil, $id)
    {
        $old = tb_mobil::find($id);
        if ($request->gambar != NULL) {
            if ($old->gambar != NULL) {
                unlink(public_path('storage/dokumen/') . $old->gambar);
            }
            $fileName = time() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move(public_path('storage/dokumen'), $fileName);

            tb_mobil::where('id_mobil', $id)->update([
                'id_mobil' => $request->id_mobil,
                'Merk_Mobil' => $request->Merk_Mobil,
                'Jenis_Mobil' => $request->Jenis_Mobil,
                'Tahun' => $request->Tahun,
                'Warna' => $request->Warna,
                'Harga_Sewa' => $request->Harga_Sewa,
                'gambar' => $fileName,
                'status' => $request->status,
            ]);
        } else {
            tb_mobil::where('id_mobil', $id)->update([
                'id_mobil' => $request->id_mobil,
                'Merk_Mobil' => $request->Merk_Mobil,
                'Jenis_Mobil' => $request->Jenis_Mobil,
                'Tahun' => $request->Tahun,
                'Warna' => $request->Warna,
                'Harga_Sewa' => $request->Harga_Sewa,
                'status' => $request->status,
            ]);
        }
        return redirect()->to(route('mobil.edit', $request->id_mobil))->withSuccess('Berhasil Ubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_mobil  $tb_mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_mobil $tb_mobil, $id)
    {
        $old = tb_mobil::find($id);
        if ($old->gambar != NULL) {
            unlink(public_path('storage/dokumen/') . $old->gambar);
        }
        tb_mobil::find($id)->delete();

        return redirect()->back()->withSuccess('Berhasil Menghapus Data');
    }
}
