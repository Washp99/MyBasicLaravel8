<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pegawai</h1>
    <div class="container">
      <a href="/createPegawai" class="btn btn-success mb-4">Tambah +</a>
      <div class="row">
        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
            {{$message}}
          </div>
        @endif
        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No. Telpon</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $row)
              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
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
                      <a href="/deleteDataPegawai/{{$row->id}}" class="btn btn-danger">Delete</a>
                  </td>
              </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>