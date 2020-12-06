<?php

namespace App\Http\Controllers;

use App\Http\Resources\Posts as ResourcesPosts;
use App\Posts;
use App\Komentar;
use App\PostsCategory;
use Illuminate\Http\Request;

class BerandaController extends Controller
{

	public function index($kategori = null, $generation = null, $username = null, $created_at = null, 
		$gender = null)
	{
		$data_posts = Posts::where('status', 'Aktif')->get();
		$kategoris = PostsCategory::where('status', 'Aktif')->get();
		$data_anggota = \App\User::all();
		return view('beranda.index', ['data_posts' => $data_posts, 'data_anggota' => $data_anggota, 'kategoris' => $kategoris, 'kategori' => $kategori, 'generation' => $generation, 'username' => $username, 'created_at' => $created_at, 'gender' => $gender]);
	}

	public function view(Posts $posts){
		return view('beranda.view',compact(['posts']));
	}

	public function postKomentar(Request $request)
	{
		$request->request->add(['users_id' => auth()->user()->id]);
		$komentar = Komentar::create($request->all());
		return redirect()->back()->with('success','Komentar berhasil ditampilkan');
	}
}
