@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="panel panel-headline" style="background-color: #e6e6e6;">
						<div class="panel-heading">
							<h3 class="panel-title" style="margin-top: 10px; font-size: 40px;">Ubah Lowongan Kerja</h3>
						</div>
						<div class="panel-body" style="margin-left: 15px;">
							<div class="row">
								<form action="/posts/{{$posts->id}}/update" method="POST" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="_method" value="put" />
									<input type="hidden" name="users_id" value="{{Auth::id()}}">
									<input type="hidden" name="id" value="{{$posts->id}}">
									<div class="form-group">
										<label for="update_title">Lowongan Kerja</label>
										<input name="title" type="text" class="form-control" id="update_title" placeholder="Lowongan Kerja" value="{{$posts->title}}" required>
										@error('title')
										<div class="alert alert-danger">*Lowongan Kerja harap diisi</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="update_body">Deskripsi</label>
										<textarea name="body" class="form-control" id="update_body" rows="3" placeholder="Deskripsi" required>{{$posts->body}}</textarea>
										@error('body')
										<div class="alert alert-danger">*Deskripsi harap diisi</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="update_category">Kategori</label>
										<select name="posts_category_id" class="form-control" id="update_category" required>
											@foreach($posts_category as $category)
											<option value="{{$category->id}}" {{$category->id == $posts->posts_category_id ? 'selected' : ''}}>{{$category->name}}</option>
											@endforeach
										</select>
										@error('posts_category_id')
										<div class="alert alert-danger">*Kategori harap dipilih</div>
										@enderror
									</div>
									<div class="form-group">
										<label for="update_file">File Pendukung</label>
										<input type="file" name="document" class="form-control-file" id="update_file">
									</div>
									<div class="form-group">
										<label for="input_filter">Saring</label>
										<select name="generation[]" class="form-control" id="input_filter" multiple required>
											<option value="" disabled>Angkatan</option>
											<!-- //? Periksa apakah ada filter dan angkatan sesuai dengan yang sudah dipilih -->
											@for($i=date('Y') - 8; $i <= date('Y'); $i++) <option {{ !empty($posts->filter) && in_array($i, json_decode($posts->filter)->generation) ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
											@endfor
										</select>
										<select name="gender" class="form-control" id="input_filter" required>
											<option value="" selected disabled>Jenis Kelamin</option>
											<option value="ALL" {{!empty($posts->filter) && json_decode($posts->filter)->gender == 'ALL' ? 'selected':''}}>Semua</option>
											<option value="L" {{!empty($posts->filter) && json_decode($posts->filter)->gender == 'L' ? 'selected':''}}>Laki-laki</option>
											<option value="P" {{!empty($posts->filter) && json_decode($posts->filter)->gender == 'P' ? 'selected':''}}>Perempuan</option>
										</select>
									</div>
									<div class="form-group">
										<label for="update_status">Status</label>
										<select name="status" class="form-control" id="update_status" required>
											<option value="Aktif" {{$posts->status == 'Aktif' ? 'selected' : ''}}>Aktif</option>
											<option value="Tidak Aktif" {{$posts->status == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
										</select>
									</div>
									<button type="submit" class="btn btn-warning">Ubah</button>
								</form>
							</div>
						</div>
					</div>
			</div>
		</div>
</div>
@endsection