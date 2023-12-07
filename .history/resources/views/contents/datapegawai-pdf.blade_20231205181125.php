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

<h2>Data Pegawai</h2>

<table>
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No. Telpon</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach ($data as $index)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->name }}</td>
                <td>
                <img src="{{asset('photoPegawai/'.$row->photo)}}" alt="" style="width:48px;"/>
                </td>
                @if($row->gender == 'male')
                    <td>Laki-Laki</td>
                @elseif($row->gender == 'female')
                    <td>Perempuan</td>
                @endif
                <td>0{{ $row->phonenum }}</td>
                <td>{{ $row->created_at->format('D M Y') }}</td>
                <td>
                    <a href="/showDataPegawai/{{$row->id}}" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}" data-name="{{$row->name}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>