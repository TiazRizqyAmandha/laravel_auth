<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class AnggotaController extends Controller
{
    public function anggotaIndex()
    {
        $data_anggota = \App\User::all();
        $jumlah_admin =  User::where('role','Admin')->count();
        $jumlah_user =  User::where('role','User')->count();
        return view('anggota.index', ['data_anggota' => $data_anggota, 'jumlah_admin' => $jumlah_admin, 'jumlah_user' => $jumlah_user]);
    }

    public function read($id)
    {
        $anggota = \App\User::find($id);
        $pekerjaan = \App\Works::where('users_id', $id)->get();
        $post = \App\Posts::where('users_id',$id)->get();
        return view('/anggota/read', ['anggota' => $anggota, 'pekerjaan' => $pekerjaan, 'post' => $post]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
            'email' => 'required|unique:users',
        ]);
        $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $request->request->add(['password_key' => $request->input('username') . '-' . substr(str_shuffle($permitted_chars), 0, 5)]);
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
        return redirect('/admin/anggota')->with('sukses1', 'data anggota berhasil di tambah');
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
        return redirect('/admin/anggota')->with('sukses2', 'data anggota berhasil di ubah');
    }

    public function delete($id)
    {
        $anggota = \App\User::find($id);
        $post = \App\Posts::where('users_id',$id)->first();
        $work = \App\Works::where('users_id',$id)->first();
        if ($post && $work) {
            return redirect('/admin/anggota')->with('gagal', '!! data anggota masih ada di tabel lowongan pekerjaan dan pekerjaan !!');
        }
        elseif($post)
        {
            return redirect('/admin/anggota')->with('gagal', '!! data anggota masih ada di tabel lowongan pekerjaan !!');
        }
        elseif($work)
        {
            return redirect('/admin/anggota')->with('gagal', '!! data anggota masih ada di tabel pekerjaan !!');
        }
        else
        {
            $anggota->delete($anggota);
            return redirect('/admin/anggota')->with('sukses3', 'data anggota berhasil di hapus');
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

    public function export() 
    {
        return Excel::download(new UsersExport, 'Anggota.xlsx');
    }

    public function exportPDF() 
    {
        $ang = \App\User::all();
        $jumlah_admin =  User::where('role','Admin')->count();
        $jumlah_user =  User::where('role','User')->count();
        $pdf = PDF::loadView('export.anggotapdf',['ang' => $ang, 'jumlah_admin' => $jumlah_admin, 'jumlah_user' => $jumlah_user]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Anggota.pdf');
    }
}
