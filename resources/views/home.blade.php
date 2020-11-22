<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <!--     <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
                </div>
                <div class="card-body">
                    <h5>Selamat datang di halaman dashboard, <strong>{{ Auth::user()->name }}</strong></h5>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Alumni</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/home">Profil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/beranda">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/posts">Lowongan Kerja <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/logout">Logout <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="GET" action="/posts">
                <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</body>

</html>