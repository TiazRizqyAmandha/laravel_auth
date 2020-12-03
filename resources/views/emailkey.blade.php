<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Email</title>
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
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box lockscreen clearfix">
                    <div class="content">
                        <div class="user text-center">
                            <img src="{{asset('admin/assets/img/logo-dark3.png')}}" class="img-circle" alt="Avatar">
                            <h2 class="name"> Cek Email</h2>
                        </div>
                <form action="/email-key" method="post">
                    @csrf
                    <div class="card-body">
                        @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                <li>Email ditemukan, silahkan cek notifikasi email anda</li>
                            </ul>
                        </div>
                        @endif
                        @if(session('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                <li>Email yang dimasukan tidak terdftar. Pastikan email yang dimasukan sudah benar.</li>
                            </ul>
                        </div>
                        @endif
                        @if(session('no'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                <li>Email yang dimasukan sudah dipakai. Pastikan email yang dimasukan sudah benar.</li>
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <input name="email_key" type="text" class="form-control" placeholder="email@gmail.com" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                        <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a> sekarang!</p>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>