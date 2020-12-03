@extends('layouts.master')
@section('content')
@php
if(isset($_GET['kategori']))
$kategori = $_GET['kategori'];
if(isset($_GET['generation']))
$generation = $_GET['generation'];
if(isset($_GET['username']))
$username = $_GET['username'];
if(isset($_GET['created_at']))
$created_at = $_GET['created_at'];
if(isset($_GET['gender']))
$gender = $_GET['gender'];
@endphp
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="panel panel-headline">
        <div class="panel-heading">
          <h3 class="panel-title">Beranda</h3>
        </div>
        <div class="panel-body">
          <form action="" method="get">
            <div class="row">
              <div class="col-md-2">
                <select class="form-control" name="kategori">
                  <option value="" selected disabled>Kategori</option>
                  @foreach($kategoris as $kat)
                  <option value="{{$kat->id}}" {{$kategori != null && $kategori == $kat->id ? 'selected' : ''}}>{{$kat->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-control" name="generation">
                  <option value="" selected disabled>Angkatan</option>
                  @for($i=date('Y') - 8; $i <= date('Y'); $i++) <option value="{{$i}}" {{$generation != null & $generation == $i ? 'selected' : ''}}>{{$i}}</option>
                  @endfor
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-control" name="username">
                  <option value="" selected disabled>Nama Pengguna</option>
                  @foreach($data_anggota as $anggota)
                  <option value="{{$anggota->username}}" {{$username != null && $username == $anggota->username ? 'selected' : ''}}>{{$anggota->username}}</option> 
                  @endforeach
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-control" name="created_at">
                  <option value="" selected disabled>Bulan Upload</option>
                  <option value="January" {{ $created_at != null && $created_at == 'January' ? 'selected' : ''}}>Januari</option>
                  <option value="February" {{ $created_at != null && $created_at == 'February' ? 'selected' : ''}}>Februari</option>
                  <option value="March" {{ $created_at != null && $created_at == 'March' ? 'selected' : ''}}>Maret</option>
                  <option value="April" {{ $created_at != null && $created_at == 'April' ? 'selected' : ''}}>April</option>
                  <option value="May" {{ $created_at != null && $created_at == 'May' ? 'selected' : ''}}>Mei</option>
                  <option value="June" {{ $created_at != null && $created_at == 'June' ? 'selected' : ''}}>Juni</option>
                  <option value="July" {{ $created_at != null && $created_at == 'July' ? 'selected' : ''}}>Juli</option>
                  <option value="August" {{ $created_at != null && $created_at == 'August' ? 'selected' : ''}}>Agustus</option>
                  <option value="September" {{ $created_at != null && $created_at == 'September' ? 'selected' : ''}}>September</option>
                  <option value="October" {{ $created_at != null && $created_at == 'October' ? 'selected' : ''}}>Oktober</option>
                  <option value="November" {{ $created_at != null && $created_at == 'November' ? 'selected' : ''}}>November</option>
                  <option value="December" {{ $created_at != null && $created_at == 'December' ? 'selected' : ''}}>Desember</option>
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-control" name="gender">
                  <option value="" selected disabled>Jenis Kelamin</option>
                  <option value="ALL" {{ $gender != null && $gender == 'P' ? 'selected' : ''}}>Semua</option>
                  <option value="L" {{ $gender != null && $gender == 'L' ? 'selected' : ''}}>Laki-laki</option>
                  <option value="P" {{ $gender != null && $gender == 'P' ? 'selected' : ''}}>Perempuan</option>
                </select>
              </div>
              <div class="col-md-1">
                <button class="btn btn-primary" type="submit">Saring</button>
              </div>
              <div class="col-md-1">
                <button class="btn btn-warning" type="submit"><a href="/beranda">Normal</a></button>
              </div>
            </div>
          </form>
          <br>

              @foreach($data_posts as $posts)

              @if($generation == null || in_array($generation,json_decode($posts->filter)->generation))
              @if($username == null || $username == $posts->users->username)
              @if($kategori == null || $kategori == $posts->posts_category_id)
              @if($created_at == null || $created_at == $posts->created_at->format('F'))
              @if($gender == null || $gender == json_decode($posts->filter)->gender)
              <h2 class="w3-text-grey">
                <i><a href="{{$posts->users->getPhotoProfil()}}"><img src="{{$posts->users->getPhotoProfil()}}" style="border: 1px solid #000000; width: 45px;height: 45px; overflow: hidden; border-radius: 50%;" class="img-circle" alt="photo_profil"/></a></i>
                {{$posts->title}}
              </h2>
              <div class="w3-container">
                <h6 class="w3-text-teal">
                  <div class="row">
                    <div class="col-md-1"><i class="fa fa-user fa-fw">&nbsp;{{$posts->users->username}}</i></div>
                    <div class="col-md-1"><i class="fa fa-graduation-cap fa-fw">&nbsp;{{$posts->users->generation}}</i></div>
                    <div class="col-md-2"><i class="fa fa-calendar fa-fw">&nbsp;{{$posts->created_at->format('l,d/F/Y')}}</i></div>
                    <div class="col-md-1"><i class="fa fa-clock-o fa-fw">&nbsp;{{$posts->created_at->format('i:s')}}</i></div>
                    <div class="col-md-1"><i class="fa fa-star fa-fw">&nbsp;{{$posts->postsCategory->name}}</i></div>
                    <div class="col-md-6">
                      <i class="fa fa-envelope fa-fw"><a href="https://mail.google.com/">&nbsp;{{$posts->users->email}}</a></i>
                    </div>
                  </div>
                </h6>
                <p>{{$posts->body}}</p>
                <p>Silahkan Klik 
                  @if(!$posts->document_url)
                  <td>-</td>
                  @else
                  <td><a download="{{$posts->title}}" href="{{url($posts->document_url)}}">Unduh</a></td>
                  @endif 
                Untuk Melihat Dokumen Resmi Perusahaan</p>
                <p>Filter || Jenis Kelamin Yang DiButuhkan : 
                  @if(json_decode($posts->filter)->gender == 'L')
                  Laki-Laki
                  @elseif(json_decode($posts->filter)->gender == 'P')
                  Perempuan
                  @else
                  Laki-Laki dan Perempuan
                  @endif ||
                </p>
                <p>Filter || Angkatan Yang DiCari :
                  @for($i=0 ; $i < count(json_decode($posts->filter)->generation) ; $i++)
                  {{json_decode($posts->filter)->generation[$i]}} - 
                  @endfor ||
                </p>
                <hr>
              </div>
              @endif
              @endif
              @endif
              @endif
              @endif
              @endforeach
            <!-- End Right Column -->
          <!-- End Grid -->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection