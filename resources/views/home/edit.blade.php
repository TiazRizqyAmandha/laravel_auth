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
			<form action="/home/{{ Auth::user()->id}}/update" method="POST">
				<input type="hidden" name="status" value="Aktif">
				{{csrf_field()}}
				<div class="form-group">
					<div class="form-group">
						<label for=""><strong>Nama Lengkap</strong></label>
						<input name="name" type="text" class="form-control" placeholder="Nama" value="{{ Auth::user()->name}}">
					</div>
					<div class="form-group">
						<label for=""><strong>Nama Pengguna</strong></label>
						<input name="username" type="text" class="form-control" placeholder="Username" value="{{Auth::user()->username}}">
					</div>
					<div class="form-group">
						<label for=""><strong>Angkatan</strong></label>
						<input name="generation" type="text" class="form-control" placeholder="Angkatan" value="{{Auth::user()->generation}}">
					</div>
					<div class="form-group">
						<!-- Date input -->
						<label for=""><strong>Tanggal Lahir</strong></label>
						<input class="form-control" id="date" name="birthdate" placeholder="MM/DD/YYY" type="date" value="{{Auth::user()->birthdate}}" />
					</div>
					<!-- Form code ends -->
					<div class="form-group">
						<label for=""><strong>Nomor Telepon</strong></label>
						<input name="phone_number" type="text" class="form-control" placeholder="Nomor Telepon" value="{{Auth::user()->phone_number}}">
					</div>
					<div class="form-group">
						<label for=""><strong>Alamat</strong></label>
						<textarea name="address" class="form-control" rows="3" placeholder="Alamat">{{Auth::user()->address}}</textarea>
					</div>
					<div class="form-group">
						<label for=""><strong>Deskripsi Diri</strong></label>
						<textarea name="self_description" class="form-control" rows="3" placeholder="Deskripsi Diri">{{Auth::user()->self_description}}</textarea>
					</div>
					<div class="form-group">
						<label for="add_gender"><strong>Gender</strong></label>
						<select name="gender" class="form-control" id="add_gender">
							<option value="L" @if(Auth::user()->gender == 'L') selected @endif>Laki-laki</option>
							<option value="P" @if(Auth::user()->gender == 'P') selected @endif>Perempuan</option>
						</select>
					</div>
					@if(Auth::user()->role == 'Admin')
					<div class="form-group">
						<label for="add_role"><strong>Peran</strong></label>
						<select name="role" class="form-control" id="add_role">
							<option value="Admin" @if(Auth::user()->role == 'Admin') selected @endif>Admin</option>
							<option value="User" @if(Auth::user()->role == 'User') selected @endif>User</option>
						</select>
					</div>
					@endif
					<button type="submit" class="btn btn-warning">Ubah</button>
				</form>
			</div>
		</div>
	</div>
	@endsection