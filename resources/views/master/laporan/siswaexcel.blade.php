
    <h4 align="center">Laporan Data Siswa</h4>
    <table border="1" width="100%">
        <thead>
        <tr>
            <th>NAMA LENGKAP</th>
            <th>JENIS KELAMIN</th>
            <th>AGAMA</th>
            <th>ALAMAT</th>
            <th>RATA-RATA NILAI</th>
        </tr>
        </thead>
        <tbody>
        @foreach($siswa as $s)
            <tr>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->jenis_kelamin }}</td>
                <td>{{ $s->agama }}</td>
                <td>{{ $s->alamat }}</td>
                <td>{{ $s->rataRataNilai() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
