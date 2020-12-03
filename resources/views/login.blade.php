<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Masuk</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
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
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="{{asset('admin/assets/img/logo-dark3.png')}}" alt="Klorofil Logo"></div>
                                <p class="lead">Masuk</p>
                            </div>
                            <form action="{{ route('login') }}" method="post">
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
                                    @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                    @endif
                                    @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for=""><strong>Email</strong></label>
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>Password</strong>&nbsp;
                                            <input type="checkbox" onclick="myFunction()"></label>
                                            <input type="password" name="password" class="form-control" id="myInput" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                        <p class="text-center">Belum punya akun? <a href="{{ route('email-key') }}">Daftar</a> sekarang!</p>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">Website Alumni</h1>
                            <p>Fakultas Teknologi Informasi</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>
<script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>