<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anda mendapatkan satu posting lowongan kerja baru</title>
</head>
<body>
    <div style="width: 600px" >
    <div> <img src="{{ $message->embed('images/HeaderAtas.jpg') }}" style="width: 550px; height: 120px;"></div>
    <div class="ml-3 p-2">
    <p style="font-size: 200%; font-weight:bold">Anda mendapatkan postingan baru lowongan kerja baru dari</p>
    <p style="font-size: 200%; font-weight:bold"><a href="http://127.0.0.1:8000" style="font-family: Monaco;">Website Alumni</a></p>
    <p style="font-size: 185%; font-weight:bold">Judul Lowongan Kerja : {{$details['title']}}</p>
    <p style="font-size: 125%;">{{$details['body']}}</p>
    <p style="font-size: 125%;">Kategori Lowongan  Kerja : {{$details['category']}}</p>
    <p style="font-size: 125%;">Pengunggah : {{$details['name']}}</p>
    <p style="font-size: 125%;">Jenis Kelamin yang dicari : 
    @if($details['gender'] == 'P')
        Perempuan
    @elseif($details['gender'] == 'L')
        Laki-laki
    @else
        Laki-laki dan Perempuan
    @endif
    </p>
    <p style="font-size:125%;">Terimakasih,</p>
    <p style="font-size:185%; font-weight:bold">Website Alumni</p>
    </div>  
    <div> <img src="{{ $message->embed('images/HeaderBawah.jpg') }}" style="width: 550px; height: 120px;"></div>

    </div>   
</body>
</html>