@extends('templates.layout')
@section('title', 'Data Pasien')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#142a42; font-weight: bold;">
                        Data Pasien
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="pasien/data/tambah">
                                <button class="btn btn-success">Tambah Data Pasien</button>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA PASIEN</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>ALAMAT</th>
                                    <th>NO TELP</th>
                                    <th>NO BPJS</th>
                                    <th>FOTO PROFIL</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $p)
                                    <tr>
                                        <td>{{ $p->nama_pasien }}</td>
                                        <td>{{ $p->jenis_kelamin }}</td>
                                        <td>{{ $p->tgl_lahir }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>{{ $p->no_telp }}</td>
                                        <td>{{ $p->no_bpjs }}</td>
                                        <td>
                                        @if ($p-> foto_profil)
                                                <img src="{{ url('foto') . '/' . $p->foto_profil }} "
                                                    style="max-width: 150px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>

                                            <a href="data/edit/{{ $p->id_pasien }}"><button class="btn btn-primary">EDIT</button></a>

                                            <button class="btn btn-danger btnHapus" idPasien="{{ $p->id_pasien }}">HAPUS</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idResep = $(this).closest('.btnHapus').attr('idResep');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'

            }).then((result) => {
                if (result.isConfirmed) {
                    //Ajax Delete
                    $.ajax({
                        type: 'DELETE',
                        url: 'rekam-hapus',
                        data: {

                            id_resep: idResep,

                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                    //Refresh Halaman
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>

@endsection