<?php

namespace App\Http\Controllers;

use App\Http\Resources\Posts as ResourcesPosts;
use App\Posts;
use App\PostsCategory;
use Illuminate\Http\Request;

class BerandaController extends Controller
{

	public function index($kategori = null, $generation = null, $gender = null)
	{
		$data_posts = Posts::where('status', 'Aktif')->get();
		$kategoris = PostsCategory::where('status', 'Aktif')->get();
		$data_anggota = \App\User::all();
		return view('beranda.index', ['data_posts' => $data_posts, 'data_anggota' => $data_anggota, 'kategoris' => $kategoris, 'kategori' => $kategori, 'generation' => $generation, 'gender' => $gender]);
	}
}
