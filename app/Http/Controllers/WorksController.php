<?php

namespace App\Http\Controllers;
use App\Http\Resources\Works as ResourcesWorks;
use App\Works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\WorksExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class WorksController extends Controller
{
	public function index()
	{
		if (Auth::user()->role == 'Admin')
			$data_works = $this->indexAdmin();
		else
			$data_works = $this->indexUser();
		return view('works.index', ['data_works' => $data_works]);
	}

	//! Fucntion untuk ambil data
	public function indexAdmin()
	{
		return ResourcesWorks::collection(Works::all());
	}
	
	public function indexUser($users_id = null)
	{
		if ($users_id == null)
			$users_id = Auth::user()->id;
		return ResourcesWorks::collection(Works::where('users_id', $users_id)->get());
	}

	public function create(Request $request)
	{
		\App\Works::create($request->all());
		return redirect('/' . strtolower(Auth::user()->role) . '/works')->with('sukses1', 'data pekerjaan berhasil di tambah');
	}

	public function edit($id)
	{
		$works = \App\Works::find($id);
		return view('works.edit', ['works' => $works]);
	}

	public function update(Request $request, $id)
	{
		$works = \App\Works::find($id);
		$works->update($request->all());
		return redirect('/' . strtolower(Auth::user()->role) . '/works')->with('sukses2', 'data pekerjaan berhasil di update');
	}

	public function delete($id)
	{
		$works = \App\Works::find($id);
		$works->delete($works);
		return redirect('/' . strtolower(Auth::user()->role) . '/works')->with('sukses3', 'data pekerjaan berhasil di hapus');
	}

	public function export() 
	{
		return Excel::download(new WorksExport, 'Pekerjaan.xlsx');
	}

	public function exportPDF() 
    {
        $w = \App\Works::all();
        $pdf = PDF::loadView('export.workspdf',['w' => $w]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Pekerjaan.pdf');
    }
}
