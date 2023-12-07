<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2 class="text-center mb-4">Data Pegawai</h2>
<table>
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No. Telpon</th>
            <th scope="col">Dibuat</th>
        </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach ($data as $row)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->name }}</td>
                @if($row->gender == 'male')
                    <td>Laki-Laki</td>
                @elseif($row->gender == 'female')
                    <td>Perempuan</td>
                @endif
                <td>0{{ $row->phonenum }}</td>
                <td>{{ $row->created_at->format('D M Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>