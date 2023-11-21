@extends('template.layout')
@section('title', 'Daftar Masuk Obat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Masuk Obat
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="masuk_obat/tambah">
                                <btn class="btn btn-success">Tambah Masuk Obat</btn>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA OBAT</th>
                                    <th>TANGGAL EXPIRED</th>
                                    <th>JUMLAH MASUK</th>
                                    <th>TANGGAL MASUK OBAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masuk_obat as $r)
                                    <tr>
                                        <td>{{ $r->nama_obat }}</td>
                                        <td>{{ $r->tgl_expired }}</td>
                                        <td>{{ $r->jumlah_masuk }}</td>
                                        <td>{{ $r->tgl_masuk_obat }}</td>
                                        <td>
                                            <a href="masuk_obat/edit/{{ $r->id_masuk_obat }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" idMasuk="{{ $r->id_masuk_obat }}">HAPUS
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
            let idMasuk = $(this).closest('.btnHapus').attr('idMasuk');
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
                        url: 'masuk_obat/hapus',
                        data: {
                            id_masuk_obat: idMasuk,
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
