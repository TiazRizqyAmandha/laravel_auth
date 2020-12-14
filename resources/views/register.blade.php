<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Daftar</title>
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
    @php
    $data_reg= null;
    if(session()->get('data_register'))
    $data_reg = session()->get('data_register');
    @endphp
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box lockscreen clearfix" style="height: auto;">
                    <div class="content">
                        <div class="user text-center">
                            <img src="{{asset('admin/assets/img/logo-dark7.png')}}" class="img-circle" alt="Avatar" style="height: 85px; width: 200px;">
                            <h2 class="name">Daftar</h2>
                        </div>
                        <form action="/register" method="post">
                            @csrf
                            <input type="hidden" name="key_user" value="{{$data_reg != null ? $data_reg->key_user : null}}">
                            <div class="card-body">
                                @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for=""><strong>Nama Lengkap</strong></label>
                                        <input value="{{ $data_reg != null ? $data_reg->name : null}}{{old('name')}}" name="name" type="text" class="form-control" placeholder="Nama Lengkap" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>Nama Pengguna</strong></label>
                                        <input value="{{ $data_reg != null ? $data_reg->username : null}} {{old('username')}}" name="username" type="text" class="form-control" placeholder="Nama Pengguna" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>Angkatan</strong></label>
                                        <input value="{{ $data_reg != null ? $data_reg->generation : null}} {{old('generation')}}" name="generation" type="text" class="form-control" placeholder="Angkatan" readonly>
                                    </div>
                                    <div class="form-group">
                                        <!-- Date input -->
                                        <label for=""><strong>Tanggal Lahir</strong></label>
                                        <input value="{{ $data_reg != null ? $data_reg->birthdate : null}} {{old('birthdate')}}" class="form-control" name="birthdate" placeholder="MM/DD/YYY" type="date" required/>
                                    </div>
                                    <!-- Form code ends -->
                                    <div class="form-group">
                                        <label for=""><strong>Nomor Telepon</strong></label>
                                        <input value="{{ $data_reg != null ? $data_reg->phone_number : null}} {{old('phone_number')}}" name="phone_number" type="text" class="form-control" placeholder="Nomor Telepon" required>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>Alamat</strong></label>
                                        <textarea name="address" class="form-control" rows="3" placeholder="Alamat" required>{{ $data_reg != null ? $data_reg->address : null}}{{old('address')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>Deskripsi Diri</strong></label>
                                        <textarea name="self_description" class="form-control" rows="3" placeholder="Deskripsi Diri" required>{{ $data_reg != null ? $data_reg->self_description : null}}{{old('self_description')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>Email</strong></label>
                                        <input value="{{ $data_reg != null ? $data_reg->email : null}} {{old('email')}}" type="text" name="email" class="form-control" placeholder="Email" readonly>
                                    </div>
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
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><strong>Peran</strong></label>
                                        <select name="role" class="form-control" disabled>
                                            <!--                                     <option value="Admin">Admin</option> -->
                                            <option value="User" selected>User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-block" id="btnSubmit" style="background-color: #97cf16 ;">Daftar</button>
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