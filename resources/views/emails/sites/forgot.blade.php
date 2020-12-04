<h1>Halo {{$user->name}}</h1>
<p>
	Takan tombol ubah password untuk merubah password kamu
	<a href="{{url('reset_password/'.$user->name.'/'.$code)}}">Ubah Password</a>
</p>