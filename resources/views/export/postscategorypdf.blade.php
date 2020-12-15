<div style="overflow-x:auto;">
	<div class="header" style="margin-bottom: 20px; text-align: center;"> <img src="images/Laporan_Kategori.png"></div>
<table class="table" style="border: 1px solid black; border-collapse: collapse; margin-left: 210px;">
	<thead style="border: 1px solid black; border-collapse: collapse;">
		<tr>
			<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Nama Kategori</th>
    		<th style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px; background-color: #66ff33; color: black;">Status</th>
		</tr>
	</thead>
	<tbody style="border: 1px solid black; border-collapse: collapse;">
		@foreach($c as $posts)
		@if($posts->status == 'Aktif')
		<tr>
			<td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$posts->name}}</td>
            <td style="border: 1px solid black; border-collapse: collapse; text-align: left; padding: 15px;">{{$posts->status}}</td>
		</tr>
		@endif
		@endforeach
	</tbody>
</table>
</div>