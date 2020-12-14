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
    <p>Berikut ini kami kirim kunci akun anda dalam website alumni</p>
    <p>Jangan bagikan kunci ini dengan siapapun!!</p>
    <p><b style="font-size: 25px;">{{$details['key_user']}}</b></p>
    <p style="font-weight:bold">Terimakasih,</p>
    <p style="font-size:110%; font-weight:bold">Website Alumni</p>
    </div>  
    <div> <img src="{{ $message->embed('images/HeaderBawah2.png') }}" style="width: 550px; height: 120px;"></div>

    </div>   
</body>
</html>
