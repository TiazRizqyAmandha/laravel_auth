<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang Anggota Baru</title>
</head>
<body>
    <div style="width: 600px" >
    <div> <img src="{{ $message->embed('images/HeaderAtas1.png') }}" style="width: 550px; height: 120px;"></div>
    <div class="ml-3 p-2">
    <p style="font-size: 125%; font-weight:bold">Yang terhormat : {{$details['name']}}</p>
    <p>Hai, ini email dari Website Alumni.</p>
    <p>Silahkan klik <a href="{{$details['link']}}"><p style="font-size:150%; font-weight:bold">Ubah Password</p></a> untuk mengubah password akun anda</p>
    <p style="font-weight:bold">Terimakasih,</p>
    <p style="font-size:110%; font-weight:bold">Website Alumni</p>
    </div>  
    <div> <img src="{{ $message->embed('images/HeaderBawah2.png') }}" style="width: 550px; height: 120px;"></div>

    </div>   
</body>
</html>
