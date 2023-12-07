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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Woles Corp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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