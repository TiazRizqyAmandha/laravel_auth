@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
<div class="container">
	<h1>Ubah Data {{Auth::user()->role}} Website Alumni</h1>
	<div class="row">
		<div class="col-lg-12">
			<form action="/home/{{ Auth::user()->id}}/updatepassword" method="POST">
				<input type="hidden" name="status" value="Aktif">
				{{csrf_field()}}
				<div class="form-group">
					<div class="form-group">
						<label><strong>Password</strong></label>
						<input type="password" name="password" class="form-control" placeholder="Password" value="{{ Auth::user()->password}}">
					</div>
					<div class="form-group">
						<label><strong>Konfirmasi Password</strong></label>
						<input type="password" name="password_confirmation" class="form-control" placeholder="Password" value="{{ Auth::user()->password}}">
					</div>
					<button type="submit" class="btn btn-warning">Ubah</button>
				</form>
			</div>
		</div>
	</div>
	@endsection