<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Ubah Password</title>
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
                            <h2 class="name">Lupa Password - Masukkan Email</h2>
                        </div>
                <form action="{{url('/forgot_password')}}" method="post">
                    @csrf
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (Session::has('gagal'))
                    <div class="alert alert-danger">
                        {{ Session::get('gagal') }}
                    </div>
                    @endif
                    @if (Session::has('gagal2'))
                    <div class="alert alert-danger">
                        {{ Session::get('gagal2') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <input name="email" id="email" type="email" class="form-control" placeholder="email@gmail.com" required>
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