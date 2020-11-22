@extends('layouts.master')
@section('content')
<h1>Edit Data Post Lowongan Kerja</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
<div class="row">
	<div class="col-lg-12">
		<form action="/posts/{{$posts->id}}/update" method="POST">
			{{csrf_field()}}
			<div class="form-group">
				<label for="input_title">Title</label>
				<input name="title" type="text" class="form-control" id="input_title" aria-describedby="emailHelp" placeholder="Title" value="{{$posts->title}}">
			</div>
			<div class="form-group">
				<label for="input_body">Body</label>
				<textarea name="body" class="form-control" id="input_body" rows="3" placeholder="Body">{{$posts->body}}</textarea>
			</div>
			<div class="form-group">
				<label for="input_category">Category</label>
				<select name="posts_category_id" class="form-control" id="input_category">
					@foreach($posts_category as $category)
					<option value="{{$category->id}}" {{$category->id == $posts->posts_category_id ? 'selected' : ''}}>{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-warning">Update</button>
		</form>
	</div>
</div>
@endsection