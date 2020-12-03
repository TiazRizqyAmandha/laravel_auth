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
							<h3 class="panel-title" style="margin-top: 5px; font-size: 40px;">Ubah Data {{Auth::user()->role}} Website Alumni</h3>
						</div>
						<div class="panel-body" style="margin-left: 15px;">
							<div class="row">
								<form action="/home/{{ Auth::user()->id}}/update" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="status" value="Aktif">
									{{csrf_field()}}
									<div class="form-group">
										<a href="/home/{{ Auth::user()->id}}/editpassword" class="btn btn-warning btn-sm">Ubah Password</a>
										<div class="form-group">
											<label for=""><strong>Photo Profil</strong></label>
											<input  type="file" name="photo_profil"  class="form-control">
										</div>
										<div class="form-group">
											<label for=""><strong>Nama Lengkap</strong></label>
											<input disabled name="name" type="text" class="form-control" placeholder="Nama" value="{{ Auth::user()->name}}" required>
										</div>
										<div class="form-group">
											<label for=""><strong>Nama Pengguna</strong></label>
											<input disabled name="username" type="text" class="form-control" placeholder="Username" value="{{Auth::user()->username}}" required>
										</div>
										<div class="form-group">
											<label for=""><strong>Angkatan</strong></label>
											<input disabled name="generation" type="text" class="form-control" placeholder="Angkatan" value="{{Auth::user()->generation}}" required>
										</div>
										<div class="form-group">
											<!-- Date input -->
											<label for=""><strong>Tanggal Lahir</strong></label>
											<input class="form-control" id="date" name="birthdate" placeholder="MM/DD/YYY" type="date" value="{{Auth::user()->birthdate}}" required/>
										</div>
										<!-- Form code ends -->
										<div class="form-group">
											<label for=""><strong>Nomor Telepon</strong></label>
											<input name="phone_number" type="text" class="form-control" placeholder="Nomor Telepon" value="{{Auth::user()->phone_number}}" required>
										</div>
										<div class="form-group">
											<label for=""><strong>Alamat</strong></label>
											<textarea name="address" class="form-control" rows="3" placeholder="Alamat" required>{{Auth::user()->address}}</textarea>
										</div>
										<div class="form-group">
											<label for=""><strong>Deskripsi Diri</strong></label>
											<textarea name="self_description" class="form-control" rows="3" placeholder="Deskripsi Diri" required>{{Auth::user()->self_description}}</textarea>
										</div>
										<div class="form-group">
											<label for="add_gender"><strong>Jenis Kelamin</strong></label>
											<select name="gender" class="form-control" id="add_gender" required>
												<option value="L" @if(Auth::user()->gender == 'L') selected @endif>Laki-laki</option>
												<option value="P" @if(Auth::user()->gender == 'P') selected @endif>Perempuan</option>
											</select>
										</div>
										@if(Auth::user()->role == 'Admin')
										<div class="form-group">
											<label for="add_role"><strong>Peran</strong></label>
											<select name="role" class="form-control" id="add_role" required>
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
			</div>
		</div>
</div>
@endsection