<?php

namespace App\Http\Controllers;

use App\Http\Resources\Posts as ResourcesPosts;
use App\Posts;
use Illuminate\Http\Request;

class BerandaController extends Controller
{

	public function index()
	{
		$data_posts = \App\Posts::all();
		$data_anggota = \App\User::all();
		return view('beranda.index', ['data_posts' => $data_posts,'data_anggota' => $data_anggota]);
	}
}
