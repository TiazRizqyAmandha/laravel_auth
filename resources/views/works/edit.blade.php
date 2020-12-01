@extends('layouts.master')
@section('content')
<h1>Ubah Data Pekerjaan</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
<div class="row">
	<div class="col-lg-12">
		<form action="/works/{{$works->id}}/update" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="users_id" value="{{Auth::id()}}">
			<input type="hidden" name="id" value="{{$works->id}}">
			<div class="form-group">
				<label for="update_company">Perusahaan</label>
				<input name="company" type="text" class="form-control" id="update_company" placeholder="Perusahaan" value="{{$works->company}}" required>
				@error('company')
				<div class="alert alert-danger">*Perusahaan harap diisi</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="update_position">Posisi</label>
				<input name="position" type="text" class="form-control" id="update_position" placeholder="Posisi" value="{{$works->position}}" required>
				@error('position')
				<div class="alert alert-danger">*Posisi harap diisi</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="update_works_place">Alamat Perusahaan</label>
				<textarea name="works_place" class="form-control" id="update_works_place" rows="3" placeholder="Alamat Perusahaan" required>{{$works->works_place}}</textarea>
				@error('works_place')
				<div class="alert alert-danger">*Alamat Perusahaan harap diisi</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="update_description">Deskripsi Pekerjaan</label>
				<textarea name="description" class="form-control" id="update_description" rows="3" placeholder="Deskripsi Pekerjaan" required>{{$works->description}}</textarea>
				@error('description')
				<div class="alert alert-danger">*Deskripsi Pekerjaan harap diisi</div>
				@enderror
			</div>
			<div class="form-group">
				<!-- Date input -->
				<label><strong>Tanggal Masuk</strong></label>
				<input class="form-control" id="date" name="date_start" placeholder="MM/DD/YYY" type="date" value="{{$works->date_start}}" required/>
				@error('date_start')
				<div class="alert alert-danger">*Tanggal Masuk Pekerjaan harap diisi</div>
				@enderror
			</div>
			<div class="form-group">
				<!-- Date input -->
				<label><strong>Tanggal Keluar</strong></label>
				<input class="form-control" id="date" name="date_end" placeholder="MM/DD/YYY" type="date" value="{{$works->date_end}}" required/>
				@error('date_end')
				<div class="alert alert-danger">*Tanggal Keluar Pekerjaan harap diisi</div>
				@enderror
			</div>
			<button type="submit" class="btn btn-warning">Ubah</button>
		</form>
	</div>
</div>
@endsection