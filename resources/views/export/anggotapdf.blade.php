<div style="overflow-x:auto;">
        <div class="header" style="margin-bottom: 20px; text-align: center;"> <img src="images/Laporan_Anggota.png"></div>
<table class="table" style="border: 1px solid black; border-collapse: collapse;">
	<thead style="border: 1px solid black; border-collapse: collapse;">
		<tr>
			<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Nama Lengkap</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Email</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Tanggal Lahir</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Angkatan</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Nomor Telepon</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Jenis Kelamin</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Peran</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Status Akun</th>
		</tr>
	</thead>
	<tbody style="border: 1px solid black; border-collapse: collapse;">
		@foreach($ang as $anggota)
		<tr>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$anggota->name}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$anggota->email}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$anggota->birthdate}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$anggota->generation}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$anggota->phone_number}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">
                @if($anggota->gender == 'P')
                Perempuan
                @else
                Laki-laki
                @endif
            </td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$anggota->role}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$anggota->status}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<br>
<table class="table" style="border: 1px solid black; border-collapse: collapse; align-content: right; margin-left: auto; margin-right: 0px;">
    <thead style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Jumlah Admin</th>
            <th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Jumlah User</th>
        </tr>
    </thead>
    <tbody style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;"><b>{{$jumlah_admin}}</b></td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;"><b>{{$jumlah_user}}</b></td>
        </tr>
    </tbody>
</table>
</div>