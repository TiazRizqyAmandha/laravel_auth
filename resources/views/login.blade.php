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
                    <div class="right">
                        <div class="content">
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
                                    @if (Session::has('successforgotpassword'))
                                    <div class="alert alert-success">
                                        {{ Session::get('successforgotpassword') }}
                                    </div>
                                    @endif
                                    <div class="form-group" style="margin-left: 120px; margin-top: 50px;">
                                        <label for="" style="color: black;"><strong>Email</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" style="width: 400px;">
                                    </div>
                                    <div class="form-group" style="margin-left: 120px;">
                                        <label for="" style="color: black;"><strong>Password</strong>&nbsp;
                                            <input type="checkbox" onclick="myFunction()"></label>
                                            <input type="password" name="password" class="form-control" id="myInput" placeholder="Password" style="width: 400px;">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-block btn-sm" style="background-color: #97cf16 ; width: 200px; margin-left: 230px;"><b style="color: black; font-size: 17px;">Masuk</b></button>
                                        <p class="text-center" style="margin-top: 5px; color: black;"><b>Belum punya akun? <a href="{{ route('email-key') }}" style="color: black;"><u>Daftar</u></a> sekarang!</b></p>
                                        <p class="text-center"><a href="{{ url('/forgot_password')}}"  style="color: black;"><b><u>Lupa Password?</u></b></a></p>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <div class="left">
                        <img src="{{asset('admin/assets/img/logo-dark7.png')}}" alt="Klorofil Logo" style="height: 135px; width: 320px;">
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