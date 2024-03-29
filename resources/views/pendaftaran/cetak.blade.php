<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cetak Data</title>
  </head>
  <body>
    <div class="container">
      <h3 style="text-align: center">Data Pendaftaran</h3>
        <div class="row">
            <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>tanggal Pendaftaran</th>
                <th>Nomor Antrian</th>
                <th>Keluhan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftaran as $p)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$p->nama_pasien }}</td>
                <td>{{$p->tgl_pendaftaran }}</td>
                <td>{{$p->nomor_antrian }}</td>
                <td>{{$p->keluhan }}</td>
                {{-- <td>
                @if ($p-> foto_profil)
                        <img src="{{ url('foto') . '/' . $p->foto_profil }} "
                            style="max-width: 150px; height: auto;" />
                    @endif
                </td> --}}
            </tr>
            @endforeach
        </tbody>
              </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>