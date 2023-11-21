@extends('templates.layout')
@section('title', 'Data Resep Obat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1" style="color:#142a42; font-weight: bold;">
                        Data Resep Obat
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="resep-tambah">
                                <button class="btn btn-success">Tambah Data Resep Obat</button>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NOMOR REKAM MEDIS</th>
                                    <th>NAMA DOKTER</th>
                                    <th>NAMA ASISTEN DOKTER</th>
                                    <th>NAMA OBAT</th>
                                    <th>TANGGAL PEMBUATAN RESEP</th>
                                    <th>STATUS PENGAMBILAN OBAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resepobat as $res)
                                    <tr>
                                        <td>{{ $res->id_rm }}</td>
                                        <td>{{ $res->nama_dokter}}</td>
                                        <td>{{ $res->nama_asdok}}</td>
                                        <td>{{ $res->nama_obat}}</td>
                                        <td>{{ $res->tgl_pembuatan_resep}}</td>
                                        <td>{{ $res->status_pengambilan_obat}}</td>
                                        <td>
                                            <a href="resep-edit/{{ $res->id_rm }}"><button class="btn btn-primary">EDIT</button></a>
                                            <button class="btn btn-danger btnHapus" idResep="{{ $res->no_rm }}">HAPUS</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br/>
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