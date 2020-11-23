@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
<div class="row">
	<div class="col-6">
		<h1>Data Post Lowongan Kerja</h1>
	</div>
	<div class="col-6">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">
			Tambah
		</button>
	</div>
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr class="table-active">
				<th scope="col">Title</th>
				<th scope="col">Body</th>
				<th scope="col">Category</th>
				<th scope="col">Document</th>
				<th scope="col">Status</th>
				<th scope="col">Name Uploader</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data_posts as $posts)
			<tr>
				<td scope="row">{{$posts->title}}</td>
				<td>{{$posts->body}}</td>
				<td>{{$posts->postsCategory->name}}</td>
				@if(!$posts->document_url)
				<td>-</td>
				@else
				<td><a download="{{$posts->title}}" href="{{url($posts->document_url)}}">Download</a></td>
				@endif
				<td>{{$posts->status}}</td>
				<td>{{$posts->users->name}}</td>
				<td>
					<a href="/posts/{{$posts->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
					<a href="/posts/{{$posts->id}}/delete" class="btn btn-danger btn-sm">Hapus</a>
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
				<h5 class="modal-title" id="addModalLabel">Tambah Posts Lowongan Kerja</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/posts/store" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}
				<input type="hidden" name="users_id" value="{{Auth::id()}}">
				<input type="hidden" name="status" value="Aktif">
				<div class="modal-body" style="height: 70vh;overflow-y: auto;">
					<div class="form-group">
						<label for="input_title">Judul</label>
						<input name="title" type="text" class="form-control" id="input_title" placeholder="Judul">
						@error('title')
						<div class="alert alert-danger">*Judul harap diisi</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="input_body">Deskripsi</label>
						<textarea name="body" class="form-control" id="input_body" rows="3" placeholder="Deskripsi"></textarea>
						@error('body')
						<div class="alert alert-danger">*Deskripsi harap diisi</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="input_category">Kategori</label>
						<select name="posts_category_id" class="form-control" id="input_category">
							<option value="" selected disabled>Kategori</option>
							@foreach($posts_category as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
						@error('posts_category_id')
						<div class="alert alert-danger">*Kategori harap dipilih</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="input_file">File Pendukung</label>
						<input type="file" name="document" class="form-control-file" id="input_file">
					</div>
					<div class="form-group">
						<label for="input_filter">Filter</label>
						<select name="generation[]" class="form-control" id="input_filter" multiple>
							<option value="" disabled>Angkatan</option>
							@for($i=date('Y') - 8; $i <= date('Y'); $i++) <option value="{{$i}}">{{$i}}</option>
								@endfor
						</select>
						<select name="gender" class="form-control" id="input_filter">
							<option value="" selected disabled>Jenis Kelamin</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection