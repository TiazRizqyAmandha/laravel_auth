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
    </div>
    <!-- Right Column -->
    <div class="w3-twothird">

      <div class="w3-container w3-card w3-white w3-margin-bottom">
        @foreach($data_posts as $posts)
        @if($posts->status == 'Aktif')
        <h2 class="w3-text-grey w3-padding-16">
          <i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>
          {{$posts->title}} / {{$posts->users->name}}
        </h2>
        <div class="w3-container">
          <h6 class="w3-text-teal">
            <div class="row">
              <div class="col"><i class="fa fa-calendar fa-fw">Senin,23/11/2020  </i></div>
              <div class="col"><i class="fa fa-star fa-fw">{{$posts->category}}</i></div>
              <div class="col">
                <i class="fa fa-envelope fa-fw">{{$posts->users->email}} </i>
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
          <hr>
        </div>
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