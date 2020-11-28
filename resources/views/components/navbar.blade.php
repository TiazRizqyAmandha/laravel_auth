<div id="navbar">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <div class="navbar-brand"><a class="nav-link" href="{{url('/home')}}">Alumni</a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- // ! MENU -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/home')}}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/beranda')}}">Beranda</a>
                    </li>
                    @if(Auth::user()->role == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/works')}}">Pekerjaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/posts')}}">Posting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/kategori')}}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/anggota')}}">Anggota</a>
                    </li>
                    @elseif(Auth::user()->role == 'User')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/user/works')}}">Pekerjaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/user/posts')}}">Posting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/user/anggota')}}">Anggota</a>
                    </li>
                    @endif
                </ul>
                <!-- // ! LOGIN & LOGOUT -->
                <ul class="navbar-nav">
                    <a href="{{Auth::user()->getPhotoProfil()}}"><img src="{{Auth::user()->getPhotoProfil()}}" style="border: 1px solid #000000; width: 30px;height: 30px; overflow: hidden; border-radius: 50%; margin-top: 6px;" class="circular-image" alt="photo_profil"/></a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name}} ({{Auth::user()->role}})
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>