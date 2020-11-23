<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function anggotaIndex()
    {
        $data_anggota = \App\User::all();
        return view('anggota.index', ['data_anggota' => $data_anggota]);
    }

    public function create(Request $request)
    {
        \App\User::create($request->all());
        return redirect('/admin/anggota')->with('sukses', 'data berhasil di tambah');
    }

    public function edit($id)
    {
        $anggota = \App\User::find($id);
        return view('/anggota/edit',['anggota'=>$anggota]);
    }

    public function update(Request $request,$id)
    {
        $anggota = \App\User::find($id);
        $anggota->update($request->all());
        return redirect('/admin/anggota')->with('sukses', 'data berhasil di ubah');
    }

    public function delete($id)
    {
        $anggota = \App\User::find($id);
        $anggota->delete($anggota);
        return redirect('/admin/anggota')->with('sukses', 'data berhasil di hapus');
    }
}
