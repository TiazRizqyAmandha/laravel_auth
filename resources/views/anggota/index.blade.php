@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
<div class="container">
	<div class="row">
		<div class="col-6">
			<h1>Data Admin dan User Website Alumni</h1>
		</div>
		<div class="col-6">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
				Tambah Data Admin dan User
			</button>
		</div>
		<table class="table table-hover">
			<tr>
				<th>Nama</th>
				<th>Angkatan</th>
				<th>Email</th>
				<th>Role</th>
			</tr>
			@foreach($data_anggota as $anggota)
			<tr>
				<td>{{$anggota->name}}</td>
				<td>{{$anggota->generation}}</td>
				<td>{{$anggota->email}}</td>
				<td>{{$anggota->role}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin dan User Website Alumni</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="/anggota/create" method="POST">
					<input type="hidden" name="status" value="Aktif">
					{{csrf_field()}}
					<div class="form-group">
						<div class="form-group">
							<label for=""><strong>Full Name</strong></label>
							<input name="name" type="text" class="form-control" placeholder="Nama">
						</div>
						<div class="form-group">
							<label for=""><strong>Username</strong></label>
							<input name="username" type="text" class="form-control" placeholder="Username">
						</div>
						<div class="form-group">
							<label for=""><strong>Angkatan</strong></label>
							<input name="generation" type="text" class="form-control" placeholder="Angkatan">
						</div>
						<div class="form-group">
							<!-- Date input -->
							<label for=""><strong>Tanggal Lahir</strong></label>
							<input class="form-control" id="date" name="birthdate" placeholder="MM/DD/YYY" type="date" />
						</div>
						<!-- Form code ends -->
						<div class="form-group">
							<label for=""><strong>Nomor Telepon</strong></label>
							<input name="phone_number" type="text" class="form-control" placeholder="Nomor Telepon">
						</div>
						<div class="form-group">
							<label for=""><strong>Alamat</strong></label>
							<textarea name="address" class="form-control" rows="3" placeholder="Alamat"></textarea>
						</div>
						<div class="form-group">
							<label for=""><strong>Deskripsi Diri</strong></label>
							<textarea name="self_description" class="form-control" rows="3" placeholder="Deskripsi Diri"></textarea>
						</div>
						<div class="form-group">
							<label for=""><strong>Email</strong></label>
							<input type="text" name="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<label for=""><strong>Password</strong></label>
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<label for=""><strong>Konfirmasi Password</strong></label>
							<input type="password" name="password_confirmation" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="add_gender"><strong>Gender</strong></label>
							<select name="gender" class="form-control" id="add_gender">
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="add_role"><strong>Role</strong></label>
							<select name="role" class="form-control" id="add_role">
								<option value="Admin">Admin</option>
								<option value="User">User</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection