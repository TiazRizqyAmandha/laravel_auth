@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
<div class="row">
	<div class="col-lg-12">
		<h1 style="text-align: center;">Data Pekerjaan</h1>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal" style="margin-bottom: 10px;">
			Tambah
		</button>
		&nbsp;
		@if(Auth::user()->role == 'Admin')
		<a href="/works/export" class="btn" style="margin-bottom: 10px; background-color: #ff66cc;">Export Excel</a>
		<a href="/works/exportpdf" class="btn" style="margin-bottom: 10px; background-color: #66ff33;">Export PDF</a>
		@endif
	</div>
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr class="table-active">
				<th scope="col">Perusahaan</th>
				<th scope="col">Posisi</th>
				<th scope="col">Alamat Perusahaan</th>
				<th scope="col">Deskripsi Pekerjaan</th>
				<th scope="col">Tanggal Masuk</th>
				<th scope="col">Tanggal Keluar</th>
				<th scope="col">Pengunggah</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data_works as $works)
			<tr>
				<td scope="row">{{$works->company}}</td>
				<td>{{$works->position}}</td>
				<td>{{$works->works_place}}</td>
				<td>{{$works->description}}</td>
				<td>{{$works->date_start}}</td>
				<td>{{$works->date_end}}</td>
				<td>{{$works->users->name}}</td>
				<td align="center">
					<a href="/works/{{$works->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
					<a href="/works/{{$works->id}}/delete" class="btn btn-danger btn-sm" id="btnDeleted">Hapus</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Tambah Pekerjaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/works/create" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}
				<input type="hidden" name="users_id" value="{{Auth::id()}}">
				<div class="modal-body" style="height: 70vh;overflow-y: auto;">
					<div class="form-group">
						<label for="input_company">Perusahaan</label>
						<input name="company" type="text" class="form-control" id="input_company" placeholder="Perusahaan" required>
					</div>
					<div class="form-group">
						<label for="input_position">Posisi</label>
						<input name="position" type="text" class="form-control" id="input_position" placeholder="Posisi" required>
						@error('position')
						<div class="alert alert-danger">*Posisi harap diisi</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="input_works_place">Alamat Perusahaan</label>
						<textarea name="works_place" class="form-control" id="input_works_place" rows="3" placeholder="Alamat Perusahaan" required></textarea>
						@error('works_place')
						<div class="alert alert-danger">*Alamat Perusahaan harap diisi</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="input_description">Deskripsi Pekerjaan</label>
						<textarea name="description" class="form-control" id="input_description" rows="3" placeholder="Deskripsi Pekerjaan" required></textarea>
						@error('description')
						<div class="alert alert-danger">*Deskripsi Pekerjaan harap diisi</div>
						@enderror
					</div>
					<div class="form-group">
						<!-- Date input -->
						<label><strong>Tanggal Masuk</strong></label>
						<input class="form-control" id="date" name="date_start" placeholder="MM/DD/YYY" type="date" required/>
					</div>
					<div class="form-group">
						<!-- Date input -->
						<label><strong>Tanggal Keluar</strong></label>
						<input class="form-control" id="date" name="date_end" placeholder="MM/DD/YYY" type="date" required/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript"> 
		$(function () {
			$("#btnDeleted").click(function () {
				alert("Yakin Ingin Menghapus Data");
				return true;
			});
		});
</script>