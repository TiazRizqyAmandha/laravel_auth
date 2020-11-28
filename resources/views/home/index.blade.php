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
				<div class="w3-white w3-text-grey w3-card-4">
					<div class="w3-display-container">
						<!--<img src="{{ Auth::user()->photo_url}}"  style="width:100%" alt="photo_url"> -->
						<a href="/home/{{ Auth::user()->id}}/edit"><i class="fa fa-cog fa-fw w3-margin-right w3-large w3-text-teal"></i></a>
					</div>

					<div class="w3-container w3-margin-right text-align: center">
						<br>
						<p><img src="{{Auth::user()->getPhotoProfil()}}"  class="img-circle" alt="photo_profil" style="border: 1px solid #000000; width: 200px;height: 200px; overflow: hidden; border-radius: 50%; margin-left: 50px;"/></p>
						<p><h4 class="w3-text-grey w3-padding-16" align="middle">{{ Auth::user()->name}} ({{Auth::user()->role}})</h4></p>
						<p><i class="fa fa-id-card fa-fw w3-margin-right w3-large w3-text-teal" name="username"></i> {{ Auth::user()->username}}</p>
						<p><i class="fa fa-graduation-cap fa-fw w3-margin-right w3-large w3-text-teal" name="generation"></i> {{ Auth::user()->generation}}</p>
						@if(Auth::user()->gender == 'P')
						<p><i class="fa fa-female fa-fw w3-margin-right w3-large w3-text-teal" name="gender"></i>
							Perempuan
						</p>
						@else
						<p><i class="fa fa-male fa-fw w3-margin-right w3-large w3-text-teal" name="gender"></i>
							Laki-Laki
						</p>
							@endif
						<p><i class="fa fa-calendar fa-fw w3-margin-right w3-large w3-text-teal" name="birthdate"></i> {{ Auth::user()->birthdate}}</p>
						<p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal" name="address"></i>{{ Auth::user()->address}} </p>
						<p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal" name="email"></i>{{ Auth::user()->email}}</p>
						<p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal" name="phone_number"></i>{{ Auth::user()->phone_number}}</p>
						<hr>

						<p class="w3-large"><b><i class="fa fa-book fa-fw w3-margin-right w3-text-teal" name="self_description"></i>Tentang saya</b></p>
						<p>{{ Auth::user()->self_description}}</p>
						<br>
					</div>
				</div><br>					
				
				<!-- End Left Column -->
			</div>
			<!-- Right Column -->
			<div class="w3-twothird">
				@foreach($data_works as $works)
				@if($works->users->id == Auth::user()->id)
				<div class="w3-container w3-card w3-white w3-margin-bottom">
					<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>{{$works->company}}</h2>
					<div class="w3-container">
						<h5 class="w3-opacity"><b>{{$works->position}} / {{$works->works_place}}</b></h5>
						<h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Kontrak Kerja : {{$works->date_start}} s/d {{$works->date_end}}</h6>
						<p>{{$works->description}}</p>
						<hr>
					</div>
				</div>
				@endif
				@endforeach
				<!-- End Right Column -->
			</div>

			<!-- End Grid -->
		</div>

		<!-- End Page Container -->
	</div>
	<!-- Page Container -->
	<footer class="w3-container w3-teal w3-center w3-margin-top">
		<p>Alumni IT Maranatha Copyright 2020 || Email Admin : 1772052@maranatha.ac.id || Nomor Telepon : 081220452951</p>
	</footer>
</body>

</html>
@endsection