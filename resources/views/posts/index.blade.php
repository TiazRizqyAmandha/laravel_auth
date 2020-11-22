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
		<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
			Tambah
		</button>
	</div>
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr class="table-active">
				<th scope="col">Title</th>
				<th scope="col">Body</th>
				<th scope="col">Category</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data_posts as $posts)
			<tr>
				<td scope="row">{{$posts->title}}</td>
				<td>{{$posts->body}}</td>
				<td>{{$posts->postsCategory->name}}</td>
				<td>
					<a href="/posts/{{$posts->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
					<a href="/posts/{{$posts->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Post Lowongan Kerja?')">Hapus</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="/posts/create" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<label for="exampleInputEmail1">Title</label>
						<input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Body</label>
						<textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Body"></textarea>
					</div>
					<!-- 						<form>
							<div class="form-group">
								<label for="exampleFormControlFile1">Pilih File</label>
								<input type="file" class="form-control-file" id="exampleFormControlFile1">
							</div>
						</form> -->
					<div class="form-group">
						<label for="select-category">Category</label>
						<select name="posts_category_id" class="form-control" id="select-category">
							@foreach($posts_category as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<!-- <label for="exampleFormControlSelect1">Category</label>
							<div class="input-group">
								<select name="category" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
									<option selected>Choose...</option>
									<option value="it">IT</option>
									<option value="bisnis">Bisnis</option>
								</select>
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="button">+</button>
								</div>
							</div> -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection