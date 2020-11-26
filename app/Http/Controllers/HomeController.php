<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
	public function index()
	{
		$data_anggota = \App\User::all();
		return view('home.index', ['data_anggota' => $data_anggota]);
	}
	public function edit($id)
	{
		$data_anggota = \App\User::find($id);
		return view('/home/edit',['data_anggota'=>$data_anggota]);
	}
	public function update(Request $request,$id)
	{
		$data_anggota = \App\User::find($id);
		$data_anggota->update($request->all());
		return redirect('home')->with('sukses', 'data anggota berhasil di ubah');
	}
	public function editpassword($id)
	{
		$data_anggota = \App\User::find($id);
		return view('/home/editpassword',['data_anggota'=>$data_anggota]);
	}
	public function updatepassword(Request $request,$id)
	{
		$data_anggota = \App\User::find($id);
        $data_anggota->password = Hash::make($request->password);
        $data_anggota->save();
        return redirect("home")->with('sukses', 'password berhasil di reset');
	}
}
