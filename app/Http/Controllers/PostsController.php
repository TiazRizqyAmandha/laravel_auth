<?php

namespace App\Http\Controllers;

use App\Http\Resources\Posts as ResourcesPosts;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
	//! Function untuk View
	public function halamanIndex()
	{
		if (Auth::user()->role == 'Admin')
			$data_posts = $this->index();
		else
			$data_posts = $this->indexUser();
		$data_posts_category = $this->getActivePostsCategories();
		return view('posts.index', ['data_posts' => $data_posts, 'posts_category' => $data_posts_category]);
	}
	// public function halamanIndexUser(Request $request)
	// {
	// 	$data_posts = $this->indexUser();
	// 	$data_posts_category = $this->getActivePostsCategories();
	// 	return view('posts.index', ['data_posts' => $data_posts, 'posts_category' => $data_posts_category]);
	// }

	//! Fucntion untuk ambil data
	public function index()
	{
		return ResourcesPosts::collection(Posts::all());
	}
	//? Mendapatkan list berdasarkan status
	public function indexStatus($status)
	{
		return ResourcesPosts::collection(Posts::where('status', $status)->get());
	}
	//? Mendapatkan list berdasarkan User
	public function indexUser($users_id = null)
	{
		if ($users_id == null)
			$users_id = Auth::user()->id;
		return ResourcesPosts::collection(Posts::where('users_id', $users_id)->get());
	}

	public function create(Request $request)
	{
		\App\Posts::create($request->all());
		return redirect('/' . strtolower(Auth::user()->role) . '/posts')->with('sukses', 'data berhasil di tambah');
	}

	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required',
			'body' => 'required',
			'posts_category_id' => 'required',
		]);

		$posts = $request->isMethod('put') ? Posts::find($request->id) : new Posts;
		$posts->title = $request->input('title');
		$posts->body = $request->input('body');
		$posts->users_id = $request->input('users_id');
		$posts->posts_category_id = $request->input('posts_category_id');
		$posts->status = $request->input('status');
		$filter = [
			'generation' => $request->input('generation'),
			'gender' => $request->input('gender'),
		];
		$posts->filter = json_encode($filter);
		//? upload file
		if ($document = $request->file('document')) {
			$document_url = 'file/documents/doc_' . $request->input('users_id') . '/'; // upload path
			$document_name = 'doc_' . preg_replace("/\s+/", "-", $request->input('title')) . '_' . $document->getClientOriginalName();
			$document->move($document_url, $document_name);
			$posts->document_url = $document_url . $document_name;
		}

		$posts->save();
		if ($request->isMethod('put'))
			return redirect('/' . strtolower(Auth::user()->role) . '/posts')->with('sukses', 'data berhasil di ubah');
		return redirect('/' . strtolower(Auth::user()->role) . '/posts')->with('sukses', 'data berhasil di tambah');
	}

	public function edit($id)
	{
		$posts = \App\Posts::find($id);
		$posts_category = $this->getActivePostsCategories();
		return view('posts.edit', ['posts' => $posts, 'posts_category' => $posts_category]);
	}

	public function update(Request $request, $id)
	{
		$posts = \App\Posts::find($id);
		$posts->update($request->all());
		return redirect('/' . strtolower(Auth::user()->role) . '/posts')->with('sukses', 'data berhasil di update');
	}

	public function delete($id)
	{
		$posts = \App\Posts::find($id);
		$posts->delete($posts);
		return redirect('/' . strtolower(Auth::user()->role) . '/posts')->with('sukses', 'data berhasil di hapus');
	}

	//? Function untuk mengambil data Posts Category dari Controller lain (default parameter)
	private function getActivePostsCategories($status = 'Aktif')
	{
		$postsCategoryController = app(PostsCategoryController::class);
		return $postsCategoryController->indexStatus($status);
	}
}
