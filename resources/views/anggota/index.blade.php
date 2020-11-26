@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
	{{session('sukses')}}
</div>
@endif
@if(session('gagal'))
<div class="alert alert-success" role="alert">
    {{session('gagal')}}
</div>
@endif
<div class="container">
	<div class="row">
		<div class="col-6">
			<h1>Data Admin dan User Website Alumni</h1>
		</div>
		<div class="col-6">
			@if(Auth::user()->role == 'Admin')
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
				Tambah Data Admin dan User
			</button>
			@endif
			<a href="https://mail.google.com/" class="btn btn-secondary btn-sm float-right">Email</a>
		</div>
		<table class="table table-hover">
			<tr>
				<th>Nama</th>
				<th>Angkatan</th>
				<th>Email</th>
				<th>Peran</th>
				<th>Aksi</th>
			</tr>
			@foreach($data_anggota as $anggota)
			<tr>
				<td>{{$anggota->name}}</td>
				<td>{{$anggota->generation}}</td>
				<td>
					<span id="theList">
						{{$anggota->email}}
					</span>
					<button id="copyButton" onclick="myCopyFunction()" disabled="select">Copy</button>
				</td>
				<td>{{$anggota->role}}</td>
				<td>
					@if(Auth::user()->role == 'Admin')
					<a href="/anggota/{{$anggota->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
					<a href="/anggota/{{$anggota->id}}/delete" class="btn btn-danger btn-sm">Hapus</a>
					@endif
					<a href="#" class="btn btn-success btn-sm">Lihat</a>
				</td>
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
					{{csrf_field()}}
					<div class="form-group">
						<div class="form-group">
							<label><strong>Nama Lengkap</strong></label>
							<input name="name" type="text" class="form-control" placeholder="Nama">
						</div>
						<div class="form-group">
							<label><strong>Nama Pengguna</strong></label>
							<input name="username" type="text" class="form-control" placeholder="Username">
						</div>
						<div class="form-group">
							<label><strong>Angkatan</strong></label>
							<input name="generation" type="text" class="form-control" placeholder="Angkatan">
						</div>
						<div class="form-group">
							<!-- Date input -->
							<label><strong>Tanggal Lahir</strong></label>
							<input class="form-control" id="date" name="birthdate" placeholder="MM/DD/YYY" type="date" />
						</div>
						<!-- Form code ends -->
						<div class="form-group">
							<label><strong>Nomor Telepon</strong></label>
							<input name="phone_number" type="text" class="form-control" placeholder="Nomor Telepon">
						</div>
						<div class="form-group">
							<label><strong>Alamat</strong></label>
							<textarea name="address" class="form-control" rows="3" placeholder="Alamat"></textarea>
						</div>
						<div class="form-group">
							<label><strong>Deskripsi Diri</strong></label>
							<textarea name="self_description" class="form-control" rows="3" placeholder="Deskripsi Diri"></textarea>
						</div>
						<div class="form-group">
							<label><strong>Email</strong></label>
							<input type="text" name="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<label for=""><strong>Password</strong>&nbsp;
							<input type="checkbox" onclick="myFunction()"></label>
							<input type="password" name="password" class="form-control" id="myInput">
						</div>
						<div class="form-group">
							<label for=""><strong>Konfirmasi Password</strong>&nbsp;
							<input type="checkbox" onclick="myFunction2()"></label>
							<input type="password" name="password_confirmation" class="form-control" id="myInput2">
						</div>
						<div class="form-group">
							<label for="add_gender"><strong>Jenis Kelamin</strong></label>
							<select name="gender" class="form-control" id="add_gender">
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="add_role"><strong>Peran</strong></label>
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
	function myCopyFunction() {
	  var myText = document.createElement("textarea")
	  myText.value = document.getElementById("theList").innerHTML;
	  myText.value = myText.value.replace(/&lt;/g,"<");
	  myText.value = myText.value.replace(/&gt;/g,">");
	  document.body.appendChild(myText)
	  myText.focus();
	  myText.select();
	  document.execCommand('copy');
	  document.body.removeChild(myText);
	}
</script>