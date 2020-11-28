@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
<div class="container">
	<div class="row">
		<h1 class="col">Ubah Data Admin dan User Website Alumni</h1>
		<button class="btn btn-primary col-2 m-2" data-toggle="modal" data-target="#resetPasswordModal">Reset Password</button>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<form action="/anggota/{{$anggota->id}}/update" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="status" value="Aktif">
				{{csrf_field()}}
				<div class="form-group">
					<div class="form-group">
						<label for=""><strong>Photo Profil</strong></label>
						<input type="file" name="photo_profil"  class="form-control">
					</div>
					<div class="form-group">
						<label for=""><strong>Nama Lengkap</strong></label>
						<input name="name" type="text" class="form-control" placeholder="Nama" value="{{$anggota->name}}" required>
					</div>
					<div class="form-group">
						<label for=""><strong>Nama Pengguna</strong></label>
						<input name="username" type="text" class="form-control" placeholder="Username" value="{{$anggota->username}}" required>
					</div>
					<div class="form-group">
						<label for=""><strong>Angkatan</strong></label>
						<input name="generation" type="text" class="form-control" placeholder="Angkatan" value="{{$anggota->generation}}" required>
					</div>
					<div class="form-group">
						<!-- Date input -->
						<label for=""><strong>Tanggal Lahir</strong></label>
						<input class="form-control" id="date" name="birthdate" placeholder="MM/DD/YYY" type="date" value="{{$anggota->birthdate}}" required/>
					</div>
					<!-- Form code ends -->
					<div class="form-group">
						<label for=""><strong>Nomor Telepon</strong></label>
						<input name="phone_number" type="text" class="form-control" placeholder="Nomor Telepon" value="{{$anggota->phone_number}}" required>
					</div>
					<div class="form-group">
						<label for=""><strong>Alamat</strong></label>
						<textarea name="address" class="form-control" rows="3" placeholder="Alamat" required>{{$anggota->address}}</textarea>
					</div>
					<div class="form-group">
						<label for=""><strong>Deskripsi Diri</strong></label>
						<textarea name="self_description" class="form-control" rows="3" placeholder="Deskripsi Diri" required>{{$anggota->self_description}}</textarea>
					</div>
					<div class="form-group">
						<label for="add_gender"><strong>Jenis Kelamin</strong></label>
						<select name="gender" class="form-control" id="add_gender" required>
							<option value="L" @if($anggota->gender == 'L') selected @endif>Laki-laki</option>
							<option value="P" @if($anggota->gender == 'P') selected @endif>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="add_role"><strong>Peran</strong></label>
						<select name="role" class="form-control" id="add_role" required>
							<option value="Admin" @if($anggota->role == 'Admin') selected @endif>Admin</option>
							<option value="User" @if($anggota->role == 'User') selected @endif>User</option>
						</select>
					</div>
					<button type="submit" class="btn btn-warning">Ubah</button>
				</form>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Password <b>{{$anggota->name}} </b>akan di reset?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
						<form action="/anggota/reset-password" method="post">
							@csrf
							<input type="hidden" name="id" value="{{$anggota->id}}">
							<button type="submit" class="btn btn-primary">Ya</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection