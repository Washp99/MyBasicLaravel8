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
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/updateData/{{$data->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" id="nama" aria-describedby="nama" value="{{$data->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" name="gender" aria-label="Pilih Jenis Kelamin">
                                    @if($data->pegawai =='male')
                                        <option selected>Laki-Laki</option>
                                    @endif
                                    @if($data->pegawai =='female')
                                        <option selected>Perempuan</option>
                                    @endif
                                        <option value="male">Laki-Laki</option>
                                        <option value="female">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="phonenum" class="form-label">No. Telfon</label>
                                <input type="number" class="form-control" name="phonenum" id="phonenum" aria-describedby="phonenum" value="{{$data->phonenum}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>