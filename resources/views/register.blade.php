<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="col-md-4 offset-md-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Form Register</h3>
                </div>
                <form action="{{ route('register') }}" method="post">
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
                        <div class="form-group">
                            <div class="form-group">
                                <label for=""><strong>Full Name</strong></label>
                                <input name="name" type="text" class="form-control" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Username</strong></label>
                                <input name="username" type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Angkatan</strong></label>
                                <input name="generation" type="text" class="form-control" placeholder="Angkatan">
                            </div>
                            <div class="form-group">
                                <!-- Date input -->
                                <label for=""><strong>Tanggal Lahir</strong></label>
                                <input class="form-control" name="birthdate" placeholder="MM/DD/YYY" type="date" />
                            </div>
                            <!-- Form code ends -->
                            <div class="form-group">
                                <label for=""><strong>Nomor Telepon</strong></label>
                                <input name="phone_number" type="text" class="form-control" placeholder="Nomor Telepon">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Alamat</strong></label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Deskripsi Diri</strong></label>
                                <textarea name="self_description" class="form-control" rows="3" placeholder="Deskripsi Diri"></textarea>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Email</strong></label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Password</strong></label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Konfirmasi Password</strong></label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Role</label>
                                <select name="role" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                        <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a> sekarang!</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>