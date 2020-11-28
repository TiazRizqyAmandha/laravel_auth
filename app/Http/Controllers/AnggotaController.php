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

    public function read($id)
    {
        $anggota = \App\User::find($id);
        $pekerjaan = \App\Works::where('users_id', $id)->get();
        return view('/anggota/read', ['anggota' => $anggota, 'pekerjaan' => $pekerjaan]);
    }

    public function create(Request $request)
    {
        if ($request->input('role') == 'Admin')
        {
            $request->request->add(['status' => 'Aktif']);
            $request->request->add(['password' => Hash::make($request->password)]);
        }
        else 
        {
            $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $request->request->add(['status' => 'Belum Aktif']);
            $request->request->add(['key_user' => $request->input('username') . '-' . substr(str_shuffle($permitted_chars), 0, 5)]);
        }

        \App\User::create($request->all());
        return redirect('/admin/anggota')->with('sukses', 'data anggota berhasil di tambah');
    }

    public function edit($id)
    {
        $anggota = \App\User::find($id);
        return view('/anggota/edit', ['anggota' => $anggota]);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $anggota = \App\User::find($id);
        $anggota->update($request->all());
        if($request->hasFile('photo_profil'))
        {
            $request->file('photo_profil')->move('images/',$request->file('photo_profil')->getClientOriginalName());
            $anggota->photo_profil = $request->file('photo_profil')->getClientOriginalName();
            $anggota->save();
        }
        return redirect('/admin/anggota')->with('sukses', 'data anggota berhasil di ubah');
    }

    public function delete($id)
    {
        $anggota = \App\User::find($id);
        $post = \App\Posts::where('users_id',$id)->first();
        $work = \App\Works::where('users_id',$id)->first();
        if ($post && $work) {
            return redirect('/admin/anggota')->with('gagal', 'data anggota masih ada di tabel posting dan pekerjaan');
        }
        elseif($post)
        {
            return redirect('/admin/anggota')->with('gagal', 'data anggota masih ada di tabel posting');
        }
        elseif($work)
        {
            return redirect('/admin/anggota')->with('gagal', 'data anggota masih ada di tabel pekerjaan');
        }
        else
        {
            $anggota->delete($anggota);
            return redirect('/admin/anggota')->with('sukses', 'data anggota berhasil di hapus');
        }
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
