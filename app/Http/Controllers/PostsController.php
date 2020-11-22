<?php

namespace App\Http\Controllers;

use App\Http\Resources\Posts as ResourcesPosts;
use App\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
	public function index(Request $request)
	{
		if ($request->has('cari')) {
			$data_posts = \App\Posts::where('title', 'LIKE', '%' . $request->cari . '%')->get();
		} else {
			$data_posts = ResourcesPosts::collection(Posts::all());
		}
		$data_posts_category = $this->getActivePostsCategories();
		return view('posts.index', ['data_posts' => $data_posts, 'posts_category' => $data_posts_category]);
	}

	public function create(Request $request)
	{
		\App\Posts::create($request->all());
		return redirect('/posts')->with('sukses', 'data berhasil di tambah');
	}

	public function edit($id)
	{
		$posts = \App\Posts::find($id);
		$posts_category = $this->getActivePostsCategories();
		return view('posts/edit', ['posts' => $posts, 'posts_category' => $posts_category]);
	}

	public function update(Request $request, $id)
	{
		$posts = \App\Posts::find($id);
		$posts->update($request->all());
		return redirect('/posts')->with('sukses', 'data berhasil di update');
	}

	public function delete($id)
	{
		$posts = \App\Posts::find($id);
		$posts->delete($posts);
		return redirect('/posts')->with('sukses', 'data berhasil di hapus');
	}

	//? Function untuk mengambil data Posts Category dari Controller lain (default parameter)
	private function getActivePostsCategories($status = 'Aktif')
	{
		$postsCategoryController = app(PostsCategoryController::class);
		return $postsCategoryController->indexStatus($status);
	}
}
