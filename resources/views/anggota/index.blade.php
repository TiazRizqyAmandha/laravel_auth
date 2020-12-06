@extends('layouts.master')
@section('content')
<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				@if (Session::has('sukses1'))
				<div class="alert alert-success">
					{{ Session::get('sukses1') }}
				</div>
				@endif
				@if (Session::has('sukses2'))
				<div class="alert alert-warning">
					{{ Session::get('sukses2') }}
				</div>
				@endif
				@if (Session::has('sukses3'))
				<div class="alert alert-danger">
					{{ Session::get('sukses3') }}
				</div>
				@endif
				@if (Session::has('gagal'))
				<div class="alert alert-info">
					{{ Session::get('gagal') }}
				</div>
				@endif
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
							<div class="row">
								<div class="col-lg-6"><h1 style="text-align: left; margin-left: 10px;">Data Anggota Website Alumni</h1>
								</div>
								<div class="col-lg-6">
									@if(Auth::user()->role == 'Admin')
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left: 30px; margin-top: 25px;"><i class="fa fa-check-circle"></i> Tambah</button>
									&nbsp;
									<button type="button" class="btn" style="margin-left: 5px; background-color: #ff3399; margin-top: 25px;"><i class="lnr lnr-printer"></i><a href="/anggota/export" style="margin-bottom: 10px; color: white;"> Export Excel</a></button>
									<button type="button" class="btn" style="margin-left: 5px; background-color: #ff6600; margin-top: 25px;"><i class="lnr lnr-printer"></i><a href="/anggota/exportpdf" style="margin-bottom: 10px; color: white;"> Export PDF</a></button>
									@endif
								</div>
							</div>
							<div class="row" style="margin-right: 10px;">
								<div class="col-md-3">
<!-- 									<div class="metric">
										<span class="icon"><i class="fa fa-download"></i></span>
										<p>
											<span class="number">1,252</span>
											<span class="title">Downloads</span>
										</p>
									</div> -->
								</div>
								<div class="col-md-3">
<!-- 									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number">203</span>
											<span class="title">Sales</span>
										</p>
									</div> -->
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-user" style="margin-top: 15px;"></i></span>
										<p>
											<span class="number">{{$jumlah_admin}}</span>
											<span class="title">Admin</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-users" style="margin-top: 15px;"></i></span>
										<p>
											<span class="number">{{$jumlah_user}}</span>
											<span class="title">User</span>
										</p>
									</div>
								</div>
							</div>
								<div class="panel-body">
									<table class="table table-bordered table-hover table-striped">
										<thead>
											<tr style="background-color: #d6d6c2;">
												<th scope="col">Photo Profil</th>
												<th scope="col">Nama</th>
												<th scope="col">Angkatan</th>
												<th scope="col">Email</th>
												<th scope="col">Peran</th>
												<th scope="col">Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data_anggota as $anggota)
											<tr>
												<td align="center"><a href="{{$anggota->getPhotoProfil()}}"><img src="{{$anggota->getPhotoProfil()}}" style="border: 1px solid #000000; width: 150px;height: 150px; overflow: hidden; border-radius: 50%;" class="circular-image" alt="photo_profil"/></a></td>
												<td>{{$anggota->name}}</td>
												<td>{{$anggota->generation}}</td>
												<td>
													{{$anggota->email}}
												</td>
												<td>{{$anggota->role}}</td>
												<td align="center">
													@if(Auth::user()->role == 'Admin')
													<a href="/anggota/{{$anggota->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
													<a href="/anggota/{{$anggota->id}}/delete" class="btn btn-danger btn-sm"  onclick="return confirm('Yakin data mau dihapus ?')">Hapus</a>
													@endif
													<a href="/anggota/{{$anggota->id}}/read" class="btn btn-success btn-sm">Lihat</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title" id="exampleModalLabel"><b>Tambah Data Admin dan User Website Alumni</b></h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="/anggota/create" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<div class="form-group">
							<label for=""><strong>Photo Profil</strong></label>
							<input type="file" name="photo_profil"  class="form-control" disabled="select">
						</div>
						<div class="form-group">
							<label><strong>Nama Lengkap</strong></label>
							<input name="name" type="text" class="form-control" placeholder="Nama" required value="{{old('name')}}">
						</div>
						<div class="form-group">
							<label><strong>Nama Pengguna</strong></label>
							<input name="username" type="text" class="form-control" placeholder="Username" required value="{{old('username')}}">
						</div>
						<div class="form-group">
							<label><strong>Angkatan</strong></label>
							<input name="generation" type="text" class="form-control" placeholder="Angkatan" required value="{{old('generation')}}">
						</div>
						<div class="form-group">
							<!-- Date input -->
							<label><strong>Tanggal Lahir</strong></label>
							<input class="form-control" id="date" name="birthdate" placeholder="MM/DD/YYY" type="date" required value="{{old('birthdate')}}"/>
						</div>
						<!-- Form code ends -->
						<div class="form-group">
							<label><strong>Nomor Telepon</strong></label>
							<input name="phone_number" type="text" class="form-control" placeholder="Nomor Telepon" required value="{{old('birthdate')}}">
						</div>
						<div class="form-group">
							<label><strong>Alamat</strong></label>
							<textarea name="address" class="form-control" rows="3" placeholder="Alamat" required>{{old('address')}}</textarea>
						</div>
						<div class="form-group">
							<label><strong>Deskripsi Diri</strong></label>
							<textarea name="self_description" class="form-control" rows="3" placeholder="Deskripsi Diri" required>{{old('self_description')}}</textarea>
						</div>
						<div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
							<label><strong>Email</strong></label>
							<input type="email" name="email" class="form-control" placeholder="Email" required value="{{old('email')}}">
							@if($errors->has('email'))
							<span class="help-block">{{$errors->first('email')}}</span>
							@endif
						</div>
						<div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
							<label for=""><strong>Password</strong>&nbsp;
							<input type="checkbox" onclick="myFunction()"></label>
							<input type="password" name="password" class="form-control" id="myInput" required value="{{old('password')}}">
							@if($errors->has('password'))
								<span class="help-block">{{$errors->first('password')}}</span>
							@endif
						</div>
						<div class="form-group {{$errors->has('password_confirmation') ? ' has-error' : ''}}">
							<label for=""><strong>Konfirmasi Password</strong>&nbsp;
							<input type="checkbox" onclick="myFunction2()"></label>
							<input type="password" name="password_confirmation" class="form-control" id="myInput2" required value="{{old('password_confirmation')}}">
							@if($errors->has('password_confirmation'))
								<span class="help-block">{{$errors->first('password_confirmation')}}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="add_gender"><strong>Jenis Kelamin</strong></label>
							<select name="gender" class="form-control" id="add_gender" required>
								<option value="L"{{(old('gender') == 'L') ? ' selected' : ''}}>Laki-laki</option>
								<option value="P"{{(old('gender') == 'P') ? ' selected' : ''}}>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="add_role"><strong>Peran</strong></label>
							<select name="role" class="form-control" id="add_role" required>
								<option value="Admin"{{(old('role') == 'Admin') ? ' selected' : ''}}>Admin</option>
								<option value="User"{{(old('role') == 'User') ? ' selected' : ''}}>User</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary" id="btnSubmit">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
@endsection
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") 
        {
        	x.type = "text";
       	} 
        else 
        {
            x.type = "password";
        }
		}
	function myFunction2() {
		var x = document.getElementById("myInput2");
		if (x.type === "password") 
		{
			x.type = "text";
		} 
		else 
		{
			x.type = "password";
		}
	}
	$(function () {
		$("#btnSubmit").click(function () {
			var password = $("#myInput").val();
			var confirmPassword = $("#myInput2").val();
			if (password != confirmPassword) {
				alert("Password dan Konfirmasi Password tidak sama.");
				return false;
			}
			return true;
		});
	});
	// function copy_text() {
	// 	document.getElementById("pilih").select();
	// 	document.execCommand("copy");
	// 	alert("Text berhasil dicopy");
	// }
</script>