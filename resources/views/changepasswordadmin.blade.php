<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Password Baru</title>
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
                            <img src="{{asset('admin/assets/img/logo-dark7.png')}}" alt="Avatar" style="height: 85px; width: 200px;">
                            <h2 class="name">Masukkan Password Baru</h2>
                        </div>
                <form method="post" action="{{route('new_password')}}" autocomplete="off" >  
                    @method('post')
                    @csrf
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-warning">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
                            <label for=""><strong>Password</strong></label>
                            <input type="checkbox" onclick="myFunction()"></label>
                            <input type="password" name="password" class="form-control" id="myInput" placeholder="Password" required>
                            @if($errors->has('password'))
                                <span class="help-block">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('password_confirmation') ? ' has-error' : ''}}">
                            <label for=""><strong>Konfirmasi Password</strong></label>
                            <input type="checkbox" onclick="myFunction2()"></label>
                            <input type="password" name="password_confirmation" class="form-control" id="myInput2" placeholder="Konfirmasi Password" required>
                            @if($errors->has('password_confirmation'))
                                <span class="help-block">{{$errors->first('password_confirmation')}}</span>
                            @endif
                            <input type="hidden" id="userkey" name="userkey" value="{{ $userkey }}">
                            <input type="hidden" id="username" name="username" value="{{ $username }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block" id="btnSubmit" style="background-color: #97cf16 ;">Kirim</button>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") 
        {
            x.type = "text";
        } 
        else 
        {
            x.type = "password";
        }
        }
    function myFunction2() {
        var x = document.getElementById("myInput2");
        if (x.type === "password") 
        {
            x.type = "text";
        } 
        else 
        {
            x.type = "password";
        }
    }
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#myInput").val();
            var confirmPassword = $("#myInput2").val();
            if (password != confirmPassword) {
                alert("Password dan Konfirmasi Password tidak sama.");
                return false;
            }
            return true;
        });
    });
</script>