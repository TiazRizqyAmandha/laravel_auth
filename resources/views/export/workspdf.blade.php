<div style="overflow-x:auto;">
<table class="table" style="border: 1px solid black; border-collapse: collapse;">
	<thead style="border: 1px solid black; border-collapse: collapse;">
		<tr>
			<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Nama Anggota</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Perusahaan</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Posisi</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Alamat Perusahaan</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Deskripsi Pekerjaan/th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Tanggal Masuk</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Tanggal Keluar</th>
		</tr>
	</thead>
	<tbody style="border: 1px solid black; border-collapse: collapse;">
		@foreach($w as $works)
		<tr>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$works->users->name}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$works->company}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$works->position}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$works->works_place}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$works->description}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$works->date_start}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$works->date_end}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>