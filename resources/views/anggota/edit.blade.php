@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
<div class="container">
	<h1>Ubah Data Admin dan User Website Alumni</h1>
	<div class="row">
		<div class="col-lg-12">
			<form action="/anggota/{{$anggota->id}}/update" method="POST">
				<input type="hidden" name="status" value="Aktif">
				{{csrf_field()}}
				<div class="form-group">
					<div class="form-group">
						<label for=""><strong>Full Name</strong></label>
						<input name="name" type="text" class="form-control" placeholder="Nama" value="{{$anggota->name}}">
					</div>
					<div class="form-group">
						<label for=""><strong>Username</strong></label>
						<input name="username" type="text" class="form-control" placeholder="Username" value="{{$anggota->username}}">
					</div>
					<div class="form-group">
						<label for=""><strong>Angkatan</strong></label>
						<input name="generation" type="text" class="form-control" placeholder="Angkatan" value="{{$anggota->generation}}">
					</div>
					<div class="form-group">
						<!-- Date input -->
						<label for=""><strong>Tanggal Lahir</strong></label>
						<input class="form-control" id="date" name="birthdate" placeholder="MM/DD/YYY" type="date" value="{{$anggota->birthdate}}" />
					</div>
					<!-- Form code ends -->
					<div class="form-group">
						<label for=""><strong>Nomor Telepon</strong></label>
						<input name="phone_number" type="text" class="form-control" placeholder="Nomor Telepon" value="{{$anggota->phone_number}}">
					</div>
					<div class="form-group">
						<label for=""><strong>Alamat</strong></label>
						<textarea name="address" class="form-control" rows="3" placeholder="Alamat">{{$anggota->address}}</textarea>
					</div>
					<div class="form-group">
						<label for=""><strong>Deskripsi Diri</strong></label>
						<textarea name="self_description" class="form-control" rows="3" placeholder="Deskripsi Diri">{{$anggota->self_description}}</textarea>
					</div>
					<div class="form-group">
						<label for=""><strong>Email</strong></label>
						<input type="text" name="email" class="form-control" placeholder="Email" value="{{$anggota->email}}">
					</div>
					<div class="form-group">
						<label for="add_gender"><strong>Gender</strong></label>
						<select name="gender" class="form-control" id="add_gender">
							<option value="L" @if($anggota->gender == 'L') selected @endif>Laki-laki</option>
							<option value="P" @if($anggota->gender == 'P') selected @endif>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="add_role"><strong>Role</strong></label>
						<select name="role" class="form-control" id="add_role">
							<option value="Admin" @if($anggota->role == 'Admin') selected @endif>Admin</option>
							<option value="User" @if($anggota->role == 'User') selected @endif>User</option>
						</select>
					</div>
					<button type="submit" class="btn btn-warning">Ubah</button>
				</form>
			</div>
		</div>
	</div>
	@endsection