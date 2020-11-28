@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html,
		body,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: "Roboto", sans-serif
		}
	</style>

	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body class="w3-light-grey">

	<div class="w3-content w3-margin-top" style="max-width:1400px;">

		<!-- The Grid -->
		<div class="w3-row-padding">
			<!-- Left Column -->
			<div class="w3-third">
				<div class="w3-white w3-text-black w3-card-4">
					<h4 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>{{$anggota->name}}</h4>
					<div class="w3-container">
						<h6 class="w3-opacity"><b>Anggota ID : </b>{{$anggota->id}}</h6>
						<h6 class="w3-opacity"><b>Alamat : </b>{{$anggota->address}}</h6>
						<h6 class="w3-opacity"><b>Tanggal Lahir : </b>{{$anggota->birthdate}}</h6>
						<h6 class="w3-opacity"><b>Angkatan : </b>{{$anggota->generation}}</h6>
						<h6 class="w3-opacity"><b>Nomor Telepon : </b>{{$anggota->phone_number}}</h6>
						<h6 class="w3-opacity">
							@if($anggota->gender == 'P')
							<b>Jenis Kelamin : </b>Perempuan
							@else
							<b>Jenis Kelamin : </b>Laki-Laki
							@endif
						</h6>
						<h6 class="w3-opacity"><b>Peran : </b>{{$anggota->role}}</h6>
						<h6 class="w3-opacity"><b>Deskripsi Diri : </b>{{$anggota->self_description}}</h6>	
						<h6 class="w3-opacity"><b>Nama Pengguna : </b>{{$anggota->username}}</h6>
						<h6 class="w3-opacity"><b>Status Akun : </b>{{$anggota->status}}</h6>
						<h6 class="w3-opacity"><b>Email : </b>{{$anggota->email}}</h6>
						<h6 class="w3-opacity"><b>Tanggal Pembuatan Akun : </b>{{$anggota->created_at}}</h6>
						<h6 class="w3-opacity"><b>Tanggal Terakhir Update Akun : </b>{{$anggota->updated_at}}</h6>
						<hr>
					</div>
				</div><br>					
				
				<!-- End Left Column -->
			</div>
			<!-- Right Column -->
				@foreach($pekerjaan as $p)
				@if($p != null)
				<div class="w3-twothird">
					<div class="w3-container w3-card w3-white w3-margin-bottom">
						<h4 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Perusahaan : {{$p->company}}</h4>
						<div class="w3-container">
							<h6 class="w3-opacity"><b>posisi : </b>{{$p->position}}</h6>
							<h6 class="w3-opacity"><b>Alamat Perusahaan : </b>{{$p->works_place}}</h6>
							<h6 class="w3-opacity"><b>Deskripsi : </b>{{$p->description}}</h6>
							<h6 class="w3-opacity"><b>Tanggal Masuk : </b>{{$p->date_start}}</h6>
							<h6 class="w3-opacity"><b>Tanggal Keluar : </b>{{$p->date_end}}</h6>
							<hr>
						</div>
					</div>
				</div>
				@else
				<div class="w3-twothird">
					<div class="w3-container w3-card w3-white w3-margin-bottom">
						<h3 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>-</h3>
						<div class="w3-container">
							<h5 class="w3-opacity"><b>posisi : </b>Tidak Ada Data Pekerjaan</h5>
							<hr>
						</div>
					</div>
				</div>
				@endif
				@endforeach
				<!-- End Left Column -->
			</div>
				<!-- End Right Column -->
			</div>

			<!-- End Grid -->
		</div>

		<!-- End Page Container -->
	</div>

	<footer class="w3-container w3-teal w3-center w3-margin-top">
		<p>Alumni IT Maranatha Copyright 2020</p>
	</footer>


	<!-- Page Container -->

</body>

</html>
@endsection