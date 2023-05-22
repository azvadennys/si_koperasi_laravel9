<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TbUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'akun' => user::where('id', '!=', auth()->user()->id)->paginate(15),
        ];
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('users')->insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => now(),
                'role' => $request->role,
                'password' => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        return redirect()->back()->withSuccess('Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user, $id)
    {
        $data = [
            'data' => user::find($id),
        ];
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user, $id)
    {
        if ($request->password != NULL) {
            // user::where('id',$id)
            DB::table('users')->where('id', $id)->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'password' => Hash::make($request->password),
                ]
            );
        } else {
            DB::table('users')->where('id', $id)->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                ]
            );
        }
        return redirect()->back()->withSuccess('Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user, $id)
    {
        user::find($id)->delete();
        return redirect()->back()->withSuccess('Berhasil Menghapus Data');
    }
}
