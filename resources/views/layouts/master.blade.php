<!doctype html>
<html lang="en">

<head>
	<title>Website Alumni - Fakultas Teknologi Informasi</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top" style="height: 85px;">
			<div class="brand">
				<a href="{{url('/home')}}"><img src="{{asset('admin/assets/img/logo-dark7.png')}}" alt="Klorofil Logo" class="img-responsive logo" style="width: 90px; height: 25px;"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{Auth::user()->getPhotoProfil()}}" class="img-circle" alt="Avatar" style="width: 35px; height: 35px;"> <span>{{ Auth::user()->name}} ({{Auth::user()->role}})</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="{{url('/logout')}}"><i class="lnr lnr-exit"></i> <span>Keluar</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<br>
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{url('/home')}}" class=""><i class="lnr lnr-picture"></i> <span>Profil</span></a></li>
						<li><a href="{{url('/beranda')}}" class=""><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
						@if(Auth::user()->role == 'Admin')
						<li><a href="{{url('/admin/works')}}" class=""><i class="lnr lnr-briefcase"></i> <span>Pekerjaan</span></a></li>
						<li><a href="{{url('/admin/posts')}}" class=""><i class="lnr lnr-cog"></i> <span>Lowongan Kerja</span></a></li>
						<li><a href="{{url('/admin/kategori')}}" class=""><i class="lnr lnr-alarm"></i> <span>Kategori</span></a></li>
						<li><a href="{{url('/admin/anggota')}}" class=""><i class="lnr lnr-users"></i> <span>Anggota</span></a></li>
						@elseif(Auth::user()->role == 'User')
						<li><a href="{{url('/user/works')}}" class=""><i class="lnr lnr-briefcase"></i> <span>Pekerjaan</span></a></li>
						<li><a href="{{url('/user/posts')}}" class=""><i class="lnr lnr-cog"></i> <span>Lowongan Kerja</span></a></li>
						<li><a href="{{url('/user/anggota')}}" class=""><i class="lnr lnr-users"></i> <span>Anggota</span></a></li>
                    	@endif
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		@yield('content')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">1772052 <i class="fa fa-love"></i>Tiaz Rizqy Amandha</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
