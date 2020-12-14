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
          <h1 style="text-align: left; margin-left: 10px;">Lihat Beranda</h1>
        </div>
        <div class="panel-body">
              <h2 class="w3-text-grey">
                <i><a href="{{$posts->users->getPhotoProfil()}}"><img src="{{$posts->users->getPhotoProfil()}}" style="border: 1px solid #000000; width: 45px;height: 45px; overflow: hidden; border-radius: 50%;" class="img-circle" alt="photo_profil"/></a></i>
                <a href="/beranda2/{{$posts->id}}/view">{{$posts->title}}</a>
              </h2>
              <div class="w3-container">
                <h6 class="w3-text-teal">
                  <div class="row">
                    <div class="col-md-1"><i class="fa fa-user fa-fw">&nbsp;{{$posts->users->username}}</i></div>
                    <div class="col-md-1"><i class="fa fa-graduation-cap fa-fw">&nbsp;{{$posts->users->generation}}</i></div>
                    <div class="col-md-2"><i class="fa fa-calendar fa-fw">&nbsp;{{$posts->created_at->format('l,d/F/Y')}}</i></div>
                    <div class="col-md-1"><i class="fa fa-clock-o fa-fw">&nbsp;{{$posts->created_at->DiffForHumans()}}</i></div>
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
                <br>
                <div class="btn-group">
                  <button class="btn btn-default"><i class="lnr lnr-thumbs-up"></i>Suka</button>
                  <button class="btn btn-default" id="btn-komentar-utama"><i class="lnr lnr-bubble"></i>Komentar</button>
                </div>
                <form action="" style="margin-top: 10px;display: none;" id="komentar-utama" method="POST">
                  @csrf
                  <input type="hidden" name="posts_id" value="{{$posts->id}}">
                  <input type="hidden" name="parent" value="0">
                  <textarea  class="form-control" name="konten"  rows="4" placeholder="Komentar Anda"></textarea>
                  <input type="submit" class="btn btn-primary" value="kirim">
                </form>
                <h3>Komentar</h3>
                <ul class="list-unstyled activity-list">
                    @foreach($posts->komentar()->where('parent',0)->orderBy('created_at','desc')->get() as $komentar)
                    <li>
                      <img src="{{$komentar->users->getPhotoProfil()}}" alt="Avatar" class="img-circle pull-left avatar"/>
                      <p><a href="#">{{$komentar->users->name}}</a><br>{{$komentar->konten}}<span class="timestamp">{{$komentar->created_at->diffForHumans()}}</span></p>
                      <form action="" method="POST" style="padding-left: 3.5em;">
                        @csrf
                       <input type="hidden" name="posts_id" value="{{$posts->id}}">
                       <input type="hidden" name="parent" value="{{$komentar->id}}">
                        <input type="text" name="konten" class="form-control">
                        <input type="submit" class="btn btn-xs" value="kirim" style="background-color: #97cf16; color: black;">
                      </form>
                      @foreach($komentar->childs()->orderBy('created_at','desc')->get() as $child)
                      <p><a href="#">{{$child->users->name}}</a>&nbsp;{{$child->konten}}<span class="timestamp">{{$child->created_at->diffForHumans()}}</span></p><br>
                      @endforeach
                    </li>
                    @endforeach
                </ul>
                <hr>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#btn-komentar-utama').click(function(){
        $('#komentar-utama').toggle('slide');
    });
  });
</script>