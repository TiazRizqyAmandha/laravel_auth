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
				<label for="exampleInputEmail1">Title</label>
				<input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" value="{{$posts->title}}">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Body</label>
				<textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Body">{{$posts->body}}</textarea>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Category</label>
				<select name="category" class="form-control" id="exampleFormControlSelect1">
					<option value="it" @if($posts->category == 'it') selected @endif>IT</option>
					<option value="bisnis" @if($posts->category == 'bisnis') selected @endif>Bisnis</option>
				</select>
			</div>
			<button type="submit" class="btn btn-warning">Update</button>
		</form>
	</div>
</div>
@endsection