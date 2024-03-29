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
    <div class="container" style="margin-right:300px">
      <h3 style="text-align: center">Data Pasien</h3>
        <div class="row">
            <table class="table table-striped mr-5">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal lahir</th>
                <th>alamat</th>
                <th>No telpon</th>
                <th>No bpjs</th>
                <th>foto profil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $p)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$p->nama_pasien }}</td>
                <td>{{$p->jenis_kelamin }}</td>
                <td>{{$p->tgl_lahir }}</td>
                <td>{{$p->alamat }}</td>
                <td>{{$p->no_telp }}</td>
                <td>{{$p->no_bpjs }}</td>
                <td style="width:10px">
                  @if (!empty($imageDataArray[$loop->index]))
                      <img src="{{ $imageDataArray[$loop->index]['src'] }}"
                          alt="{{ $imageDataArray[$loop->index]['alt'] }}"
                          style="max-width: 100px; height: auto;" />
                  @endif
              </td>
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