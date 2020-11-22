<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function anggotaIndex()
    {
    	$data_anggota = \App\User::all();
    	return view('anggota.index',['data_anggota'=>$data_anggota]);
    } 

    public function create(Request $request)
    {
    	\App\User::create($request->all());
    }
}
