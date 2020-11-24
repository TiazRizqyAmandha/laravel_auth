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
		html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
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

					<div class="w3-container">
						<br>
						<p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal" name="name"></i> {{ Auth::user()->name}} ({{Auth::user()->role}})</p>
						<p><i class="fa fa-id-card fa-fw w3-margin-right w3-large w3-text-teal" name="username"></i> {{ Auth::user()->username}}</p>
						<p><i class="fa fa-graduation-cap fa-fw w3-margin-right w3-large w3-text-teal" name="generation"></i> {{ Auth::user()->generation}}</p>
						<p><i class="fa fa-transgender fa-fw w3-margin-right w3-large w3-text-teal" name="gender"></i> {{ Auth::user()->gender}}</p>
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
				
				<div class="w3-container w3-card w3-white w3-margin-bottom">
					<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
					<div class="w3-container">
						<h5 class="w3-opacity"><b>Front End Developer / halo.com</b></h5>
						<h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jan 2015 - <span class="w3-tag w3-teal w3-round">Current</span></h6>
						<p>Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
						<hr>
					</div>
					<div class="w3-container">
						<h5 class="w3-opacity"><b>Web Developer / something.com</b></h5>
						<h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>
						<p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
						<hr>
					</div>
					<div class="w3-container">
						<h5 class="w3-opacity"><b>Graphic Designer / designsomething.com</b></h5>
						<h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2010 - Mar 2012</h6>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><br>
					</div>
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