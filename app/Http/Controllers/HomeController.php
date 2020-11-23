<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$data_anggota = \App\User::all();
		return view('home', ['data_anggota' => $data_anggota]);
	}
	public function edit($id)
	{
		$data_anggota = \App\User::find($id);
		return view('edithome',['data_anggota'=>$data_anggota]);
	}
	public function update(Request $request,$id)
	{
		$data_anggota = \App\User::find($id);
		$data_anggota->update($request->all());
		return redirect('home')->with('sukses', 'data berhasil di ubah');
	}
}
