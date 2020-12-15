<div style="overflow-x:auto;">
	<div class="header" style="margin-bottom: 20px; text-align: center;"> <img src="images/Laporan_Lowongan_Kerja.png"></div>
<table class="table" style="border: 1px solid black; border-collapse: collapse;">
	<thead style="border: 1px solid black; border-collapse: collapse;">
		<tr>
			<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Lowongan Kerja</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Deskripsi Pekerjaan</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Kategori</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Nama Pengunggah</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Status Lowongan Kerja</th>
		</tr>
	</thead>
	<tbody style="border: 1px solid black; border-collapse: collapse;">
		@foreach($p as $posts)
		@if($posts->status == 'Aktif')
		<tr>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$posts->title}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$posts->body}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$posts->postsCategory->name}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$posts->users->name}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$posts->status}}</td>
		</tr>
		@endif
		@endforeach
	</tbody>
</table>
</div>