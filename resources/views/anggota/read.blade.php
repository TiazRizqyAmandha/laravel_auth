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
										<a href="{{$anggota->getPhotoProfil()}}"><img src="{{$anggota->getPhotoProfil()}}" class="img-circle" alt="Avatar" style="border: 1px solid #000000; width: 80px;height: 80px; overflow: hidden; border-radius: 50%;"></a>
										<h3 class="name">{{$anggota->name}}</h3>
										<span class="online-status status-available">{{$anggota->status}}</span>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading"><strong>Data Diri</strong></h4>
										<ul class="list-unstyled list-justify">
											<li>ID<span>{{$anggota->id}}</span></li>
											<li>Nama Pengguna<span>{{$anggota->username}}</span></li>
											<li>Angkatan<span>{{$anggota->generation}}</span></li>
											<li>Jenis Kelamin
												<span>
												@if($anggota->gender == 'P')
													Perempuan
												@else
													Laki-Laki
												@endif
												</span>
											</li>
											<li>Tanggal Lahir<span>{{$anggota->birthdate}}</span></li>
											<li>Nomor Telepon<span>{{$anggota->phone_number}}</span></li>
											<li>Peran <span>{{$anggota->role}}</span></li>
											<li>Alamat <span>{{$anggota->address}}</span></li>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading"><strong>Tentang Saya</strong></h4>
										<p>{{$anggota->self_description}}</p>
									</div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<h4 class="heading">Kirim Email</h4>
								<!-- AWARDS -->
								<div class="awards">
									<div class="text-center">
										<a href="https://mail.google.com/" class="btn btn-default">Email</a>
										<input type="text" value="{{$anggota->email}}" id="myInput" readonly="">
										<!-- The button used to copy the text -->
										<button onclick="myFunction()" style="width: 75px; height: 28px; text-align: center; background-color: #ff6600;">Copy</button>
									</div>
								</div>
								<!-- END AWARDS -->
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Pekerjaan</a></li>
										<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Riwayat <span class="badge">{{count($post)}}</span></a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">
										<ul class="list-unstyled activity-timeline">
											@foreach($pekerjaan as $p)
											@if($p != null)
											<li>
												<i class="lnr lnr-briefcase activity-icon"></i>
												<p><b style="font-size: 20px;">Perusahaan : {{$p->company}}</b>
												 <span class="timestamp"><b>Alamat Perusahaan : </b>{{$p->works_place}}</span>
												 <span class="title"><b>posisi : </b>{{$p->position}}</span><br>
												 <span class="short-description"><b>Deskripsi : </b>{{$p->description}}</span><br>
												 <span class="date"><b>Tanggal Masuk : </b>{{$p->date_start}}</span><br>
												 <span class="date"><b>Tanggal Keluar : </b>{{$p->date_end}}</span><br>
												</p>
											</li>
											@endif
											@endforeach
										</ul>
									</div>
									<div class="tab-pane fade" id="tab-bottom-left2">
										<div class="table-responsive">
											<table class="table project-table">
												<thead>
													<tr>
														<th scope="col">Lowongan Kerja</th>
														<th scope="col">Deskripsi</th>
														<th scope="col">Kategori</th>
														<th scope="col">Dokumen</th>
														<th scope="col">Status</th>
													</tr>
												</thead>
												<tbody>
													@foreach($post as $posts)
													@if($p != null)
													<tr>
														<td scope="row">{{$posts->title}}</td>
														<td>{{$posts->body}}</td>
														<td>{{$posts->postsCategory->name}}</td>
														@if(!$posts->document_url)
														<td>-</td>
														@else
														<td><a download="{{$posts->title}}" href="{{url($posts->document_url)}}">Unduh</a></td>
														@endif
														<td>{{$posts->status}}</td>
													</tr>
													@endif
													@endforeach
												</tbody>
											</table>
										</div>
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
<script type="text/javascript">
	function myFunction() {
		/* Get the text field */
		var copyText = document.getElementById("myInput");

		/* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		/* Copy the text inside the text field */
		document.execCommand("copy");

		/* Alert the copied text */
		alert("Copied the text: " + copyText.value);
	}
</script>