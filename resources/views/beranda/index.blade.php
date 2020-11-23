@extends('layouts.master')
@section('content')

@php
if(isset($_GET['kategori']))
$kategori = $_GET['kategori'];
if(isset($_GET['generation']))
$generation = $_GET['generation'];
if(isset($_GET['gender']))
$gender = $_GET['gender'];
@endphp
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
      <form action="" method="get">
        <div class="row">
          <div class="col-3">
            <select class="form-control" name="kategori">
              <option value="" selected>Kategori</option>
              @foreach($kategoris as $kat)
              <option value="{{$kat->id}}" {{$kategori != null && $kategori == $kat->id ? 'selected' : ''}}>{{$kat->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-3">
            <select class="form-control" name="generation">
              <option value="" selected>Angkatan</option>
              @for($i=date('Y') - 8; $i <= date('Y'); $i++) <option value="{{$i}}" {{$generation != null & $generation == $i ? 'selected' : ''}}>{{$i}}</option>
              @endfor
            </select>
          </div>
          <div class="col-3">
            <select class="form-control" name="gender">
              <option value="" selected>Jenis Kelamin</option>
              <option value="L" {{ $gender != null && $gender == 'L' ? 'selected' : ''}}>Laki-laki</option>
              <option value="P" {{ $gender != null && $gender == 'P' ? 'selected' : ''}}>Perempuan</option>
            </select>
          </div>
          <div class="col-1">
            <button class="btn btn-primary" type="submit">Filter</button>
          </div>
        </div>
      </form>
    </div>
    <br>
    <!-- Right Column -->
    <div class="row">
      <div class="col-lg-10" style="background-color: white">
        @foreach($data_posts as $posts)
        @if($generation == null || in_array($generation,json_decode($posts->filter)->generation))
        @if($gender == null || $gender == json_decode($posts->filter)->gender)
        @if($kategori == null || $kategori == $posts->posts_category_id)
        <h2 class="w3-text-grey w3-padding-16">
          <i class="fa fa-user fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>
          {{$posts->title}}
        </h2>
        <div class="w3-container">
          <h6 class="w3-text-teal">
            <div class="row">
              <div class="col-lg-1"><i class="fa fa-user fa-fw">&nbsp;{{$posts->users->username}}</i></div>
              <div class="col-lg-1"><i class="fa fa-graduation-cap fa-fw">&nbsp;{{$posts->users->generation}}</i></div>
              <div class="col-lg-3"><i class="fa fa-calendar fa-fw">&nbsp;{{$posts->created_at->format('l,d_F_Y')}}</i></div>
              <div class="col-lg-2"><i class="fa fa-star fa-fw">&nbsp;{{$posts->postsCategory->name}}</i></div>
              <div class="col-lg-5">
                <i class="fa fa-envelope fa-fw"><a href="https://mail.google.com/">&nbsp;{{$posts->users->email}}</a></i>
              </div>
            </div>
          </h6>
          <p>{{$posts->body}}</p>
          <p>Silahkan Klik 
            @if(!$posts->document_url)
            <td>-</td>
            @else
            <td><a download="{{$posts->title}}" href="{{url($posts->document_url)}}">Download</a></td>
            @endif 
          Untuk Melihat Dokumen Resmi Perusahaan</p>
          <p>Filter || {{$posts->filter}} ||</p>
          <hr>
        </div>
        @endif
        @endif
        @endif
        @endforeach
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