<?php

namespace App\Http\Controllers;

use App\Models\tb_transaksi;
use App\Http\Requests\Storetb_transaksiRequest;
use App\Http\Requests\Updatetb_transaksiRequest;
use App\Models\tb_detail_transaksi_mobil;
use App\Models\tb_detail_transaksi_supir;
use App\Models\tb_mobil;
use App\Models\tb_supir;
use App\Models\User;
use Illuminate\Http\Request;

class TbTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'transaksi' => tb_transaksi::orderby('created_at', 'ASC')->paginate(15),
        ];
        // dd($data['transaksi']);
        return view('admin.transaksi.index', $data);
    }
    public function cetak(Request $request)
    {
        $data = [
            'transaksi' => tb_transaksi::whereDate('created_at', '>=', $request->tglawal)
                ->whereDate('created_at', '<=', $request->tglakhir)->orderby('created_at', 'ASC')->get(),
        ];
        // dd($data['transaksi']);
        return view('admin.transaksi.cetak', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'mobil' => tb_mobil::all(),
            'supir' => tb_supir::all(),
            'user' => User::all(),
        ];
        return view('admin.transaksi.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storetb_transaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = 0;
        foreach ($request->mobil_id as $index) {
            // dd($index);
            $oldmobil = tb_mobil::find($index);
            $total += $oldmobil->Harga_Sewa;
        }
        $idtransaksi = tb_transaksi::create([
            'user_id' => $request->user_id,
            'total' => $total,
            'created_at' => now(),
        ])->id;

        foreach ($request->mobil_id as $index) {
            tb_detail_transaksi_mobil::create([
                'transaksi_id' => $idtransaksi,
                'mobil_id' => $index,
                'created_at' => now(),
            ]);
        }
        if ($request->supir_id != NULL) {
            foreach ($request->supir_id as $index) {
                tb_detail_transaksi_supir::create([
                    'transaksi_id' => $idtransaksi,
                    'supir_id' => $index,
                    'created_at' => now(),
                ]);
            }
        }
        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_transaksi  $tb_transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(tb_transaksi $tb_transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_transaksi  $tb_transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_transaksi $tb_transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetb_transaksiRequest  $request
     * @param  \App\Models\tb_transaksi  $tb_transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Updatetb_transaksiRequest $request, tb_transaksi $tb_transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_transaksi  $tb_transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_transaksi $tb_transaksi)
    {
        //
    }
}
