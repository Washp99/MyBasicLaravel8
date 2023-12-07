<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Woles Corp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pegawai</h1>
    <div class="container">
      <a href="/createPegawai" class="btn btn-success mb-4">Tambah +</a>
      <div class="row g-3 align-items-center mt-2 mb-2">
        <div class="col-auto">
          <form action="/pegawai" method="GET">
            <input type="search" class="form-control" name="search" id="search" aria-describedby="search">
          </form>
        </div>
        <div class="col-auto">
          <a href="/exportpdf" class="btn btn-info">Export PDF</a>
        </div>
        <div class="col-auto">
          <a href="/exportexcel" class="btn btn-success">Export Excel</a>
        </div>
      </div>

      <div class="row">
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
          @foreach ($data as $index=>$row)
              <tr>
                  <th scope="row">{{ $index+$data->firstItem() }}</th>
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
      {{$data->links()}}
      </div>
    </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <script>
    $('.delete').click(function(){
      var pegawaiid=$(this).attr('data-id');
      var pegawainame=$(this).attr('data-name');
      swal({
        title: "Apakah kamu yakin?",
        text: "Kamu akan menghapus data pegawai dengan nama "+pegawainame+"",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location="/deleteDataPegawai/"+pegawaiid+""
          swal("Poof! Data berhasil dihapus", {
            icon: "success",
          });
        } else {
          swal("Data tidak jadi dihapus!");
        }
      });
    });
  </script>
  <script>
    @if (Session::has('success'))
      toastr.success("{{Session::get('success')}}")
    @endif
  </script>
</html>