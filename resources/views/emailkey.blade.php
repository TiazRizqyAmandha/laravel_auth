<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Key User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="col-md-4 offset-md-4 mt-5" style="margin-top: 100px;">
            <div class="card">
                <div class="card-header" style="background-color: #94b8b8;">
                    <h3 class="text-center">Email</h3>
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
                            <label><strong>Email</strong></label>
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
    <div class='footer' style="width: 1230px; height: 40px; margin-top: 170px; background-color: #94b8b8; text-align: center;">
      Alumni IT Maranatha Copyright 2020 || Email Admin : 1772052@maranatha.ac.id || Nomor Telepon : 081220452951
  </div>
</body>

</html>