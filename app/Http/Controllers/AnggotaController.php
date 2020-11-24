<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function anggotaIndex()
    {
        $data_anggota = \App\User::all();
        return view('anggota.index', ['data_anggota' => $data_anggota]);
    }

    public function create(Request $request)
    {
        if ($request->input('role') == 'Admin')
            $request->request->add(['status' => 'Aktif']);
        else {
            $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $request->request->add(['status' => 'Belum Aktif']);
            $request->request->add(['key_user' => $request->input('username') . '-' . substr(str_shuffle($permitted_chars), 0, 5)]);
        }
        \App\User::create($request->all());
        return redirect('/admin/anggota')->with('sukses', 'data berhasil di tambah');
    }

    public function edit($id)
    {
        $anggota = \App\User::find($id);
        return view('/anggota/edit', ['anggota' => $anggota]);
    }

    public function update(Request $request, $id)
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

    public function resetPassword(Request $request)
    {
        $anggota = User::find($request->input('id'));
        if ($anggota != null) {
            $anggota->password = Hash::make('ukm12345');
            $anggota->save();
            return redirect("/admin/anggota")->with('sukses', 'password berhasil di reset');
        }
    }
}
