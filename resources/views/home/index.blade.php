@extends('layouts.master')
@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-profile" style="height: 1000px;">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{Auth::user()->getPhotoProfil()}}" class="img-circle" alt="Avatar" style="border: 1px solid #000000; width: 80px;height: 80px; overflow: hidden; border-radius: 50%;">
										<h3 class="name">{{ Auth::user()->name}}({{Auth::user()->role}})</h3>
										<span>{{Auth::user()->username}}</span>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading"><strong>Data Diri</strong>
										<a href="/home/{{ Auth::user()->id}}/edit"><i class="fa fa-cog fa-fw w3-margin-right w3-large w3-text-teal"></i></a></h4>
										<ul class="list-unstyled list-justify">
											<li><i class="fa fa-id-card fa-fw w3-margin-right w3-large w3-text-teal" name="username"></i> {{Auth::user()->id}}</li>
											<li><i class="fa fa-graduation-cap fa-fw w3-margin-right w3-large w3-text-teal" name="generation"></i> {{Auth::user()->generation}}</li>
											<li>
												@if(Auth::user()->gender == 'P')
												<i class="fa fa-female fa-fw w3-margin-right w3-large w3-text-teal" name="gender"></i> Perempuan
												@else
												<i class="fa fa-male fa-fw w3-margin-right w3-large w3-text-teal" name="gender"></i> 
												Laki-Laki
												@endif
											</li>
											<li>
												<i class="fa fa-calendar fa-fw w3-margin-right w3-large w3-text-teal" name="birthdate"></i> 
												{{Auth::user()->birthdate}}
											</li>
											<li>
												<i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal" name="phone_number"></i> {{Auth::user()->phone_number}}</li>
											<li>
												<i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal" name="email"></i> {{Auth::user()->email}}</li>
												<li>
												<i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal" name="address"></i> 
												{{Auth::user()->address}}
											</li>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">
											<i class="fa fa-book fa-fw w3-margin-right w3-text-teal" name="self_description"></i><strong>Tentang Saya</strong></h4>
										<p>{{Auth::user()->self_description}}</p>
									</div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">
										<ul class="list-unstyled activity-timeline">
											@foreach($data_works as $works)
											@if($works->users->id == Auth::user()->id)
											<li>
												<i class="lnr lnr-briefcase activity-icon"></i>
												<p><b style="font-size: 20px;">Perusahaan : {{$works->company}}</b>
													<span class="timestamp"><b>Alamat Perusahaan : </b>{{$works->works_place}}</span>
													<span class="title"><b>posisi : </b>{{$works->position}}</span><br>
													<span class="short-description"><b>Deskripsi : </b>{{$works->description}}</span><br>
													<span class="date"><b>Tanggal Masuk : </b>{{$works->date_start}}</span><br>
													<span class="date"><b>Tanggal Keluar : </b>{{$works->date_end}}</span><br>
												</p>
											</li>
											@endif
											@endforeach
										</ul>
									</div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
		</div>
	</div>
</div>
@endsection