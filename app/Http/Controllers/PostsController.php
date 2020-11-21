<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
	public function index(Request $request)
	{
		if($request->has('cari'))
		{
			$data_posts = \App\Posts::where('title','LIKE','%'.$request->cari.'%')->get();
		}
		else
		{
			$data_posts = \App\Posts::all();
		}
		return view('posts.index',['data_posts' => $data_posts]);
	}

	public function create(Request $request)
	{
		\App\Posts::create($request->all());
		return redirect('/posts')->with('sukses','data berhasil di tambah');
	}

	public function edit($id)
	{
		$posts = \App\Posts::find($id);
		return view('posts/edit',['posts'=>$posts]);
	}
	
	public function update(Request $request,$id)
	{
		$posts = \App\Posts::find($id);
		$posts->update($request->all());
		return redirect('/posts')->with('sukses','data berhasil di update');
	}

	public function delete($id)
	{
		$posts = \App\Posts::find($id);
		$posts->delete($posts);
		return redirect('/posts')->with('sukses','data berhasil di hapus');
	}
}
