@extends('template.layout')
@section('title', 'Daftar Pendaftaran')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Pendaftaran
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="pendaftaran/tambah">
                                <btn class="btn btn-success">Tambah Data Pendaftaran</btn>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA PASIEN</th>
                                    <th>TANGGAL PENDAFTARAN</th>
                                    <th>NOMOR ANTRIAN</th>
                                    <th>KELUHAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftaran as $r)
                                    <tr>
                                        <td>{{ $r->nama_pasien }}</td>
                                        <td>{{ $r->tgl_pendaftaran }}</td>
                                        <td>{{ $r->nomor_antrian }}</td>
                                        <td>{{ $r->keluhan }}</td>
                                        <td>
                                            <a href="pendaftaran/edit/{{ $r->id_pendaftaran }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" idPendaftar="{{ $r->id_pendaftaran }}">HAPUS
                                            </btn>

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
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idPendaftar = $(this).closest('.btnHapus').attr('idPendaftar');
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
                        url: 'pendaftaran/hapus',
                        data: {
                            id_pendaftaran: idPendaftar,
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
        $(document).ready(function() {
            $('.DataTable').DataTable();
        });
    </script>

@endsection
