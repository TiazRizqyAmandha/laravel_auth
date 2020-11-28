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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="background-color: #94b8b8;">
                    <h3 class="text-center">Key</h3>
                </div>
                <form action="/key-user" method="post">
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
                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                <li>Key yang dimasukan belum benar. Pastikan key yang dimasukan sudah benar.</li>
                            </ul>
                        </div>
                        @endif
                        @if(session('no'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                <li>Key yang dimasukan sudah dipakai. Pastikan key yang dimasukan sudah benar.</li>
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label><strong>Key</strong></label>
                            <input name="key_user" type="text" class="form-control" placeholder="Key" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Cek</button>
                        <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a> sekarang!</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class='footer' style="width: 1230px; height: 40px; margin-top: 250px; background-color: #94b8b8; text-align: center;">
      Alumni IT Maranatha Copyright 2020 || Email Admin : 1772052@maranatha.ac.id || Nomor Telepon : 081220452951
    </div>
</body>

</html>