<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Siswa</title>
</head>
<style type="text/css">
	table.table {
		width: 100%;
		border-collapse: collapse;
	}
	table.table thead tr th,
	table.table tbody tr td {
		padding: 5px;
	}
</style>
<body>
	<table class="table" border="1">
		<thead>
			<tr>
				<th>NAMA</th>
				<th>JENIS KELAMIN</th>
				<th>AGAMA</th>
				<th>RATA-RATA NILAI</th>
			</tr>
		</thead>
		<tbody>
			@foreach($siswa as $s)
			<tr>
				<td>{{$s->nama}}</td>
				<td>{{$s->jenis_kelamin}}</td>
				<td>{{$s->agama}}</td>
				<td>{{$s->rataRataNilai()}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>