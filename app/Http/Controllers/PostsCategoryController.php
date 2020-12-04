<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostsCategory as ResourcesPostsCategory;
use App\PostsCategory;
use Illuminate\Http\Request;
use App\Exports\PostsCategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PostsCategoryController extends Controller
{
    //! Function untuk View
    public function halamanIndex()
    {
        $posts_category = $this->index();
        return view('posts_category.index', ['posts_category' => $posts_category]);
    }

    //! Fucntion untuk ambil data
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourcesPostsCategory::collection(PostsCategory::all());
    }

    //? Mendapatkan list berdasarkan status
    public function indexStatus($status)
    {
        return ResourcesPostsCategory::collection(PostsCategory::where('status', $status)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        \App\PostsCategory::create($request->all());
        return redirect('/admin/kategori')->with('sukses1', 'data kategori berhasil di tambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostsCategory  $postsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts_category = \App\PostsCategory::find($id);
        return view('posts_category.edit', ['posts_category' => $posts_category]);
    }
    public function update(Request $request, $id)
    {
        $posts_category = \App\PostsCategory::find($id);
        $posts_category->update($request->all());
        return redirect('/admin/kategori')->with('sukses2', 'data kategori berhasil di update');
    }

    public function delete($id)
    {
        $posts_category = \App\PostsCategory::find($id);
        $post = \App\Posts::where('posts_category_id',$id)->first();
        if($post)
        {
            return redirect('/admin/kategori')->with('gagal', '!! data kategori masih ada di tabel lowongan kerja !!');
        }
        else
        {
            $posts_category->delete($posts_category);
            return redirect('/admin/kategori')->with('sukses3', 'data kategori berhasil di hapus');
        }
    }

    public function export() 
    {
        return Excel::download(new PostsCategoryExport, 'Kategori.xlsx');
    }

    public function exportPDF() 
    {
        $c = \App\PostsCategory::all();
        $pdf = PDF::loadView('export.postscategorypdf',['c' => $c]);
        return $pdf->download('Kategori.pdf');
    }
}
