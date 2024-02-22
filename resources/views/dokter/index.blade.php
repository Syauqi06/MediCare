@extends('templates.layout')
@section('title', 'Daftar Dokter')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1" style="color:#b9d1f6; font-weight: bold;">
                        Data Dokter
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-header d-flex justify-content-between">
                            <span class="h5">
                                Jumlah Dokter Yang Tercatat : {{ $jumlahDokter }}
                            </span>
                            <a href="dokter/cetak">
                                <btn class="btn btn-success ml-auto">
                                    <svg style="fill: #ffff" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <style>
                                            svg {
                                                fill: #111111
                                            }
                                        </style>
                                        <path
                                            d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                    </svg>Cetak PDF
                                </btn>
                            </a>
                        </div>
                        <hr>
                        <div class="col-md-4">
                            <a href="dokter-tambah">
                                <button class="btn btn-success">Tambah Data Dokter</button>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA DOKTER</th>
                                    <th>NAMA POLI</th>
                                    <th>NO TELP</th>
                                    <th>FOTO DOKTER</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dokter as $d)
                                    <tr>
                                        <td>{{ $d->nama_dokter }}</td>
                                        <td>{{ $d->jenis_poli }}</td>
                                        <td>{{ $d->no_telp }}</td>
                                        <td>
                                            @if ($d->foto_dokter)
                                                <img src="{{ url('foto') . '/' . $d->foto_dokter }} "
                                                    style="max-width: 150px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>
                                            <a href="dokter-detail/{{ $d->id_dokter }}"><button
                                                    class="btn btn-info">DETAIL</button></a>
                                            <a href="dokter-edit/{{ $d->id_dokter }}"><button
                                                    class="btn btn-warning">EDIT</button></a>
                                            <button class="btn btn-danger btnHapus"
                                                idDokter="{{ $d->id_dokter }}">HAPUS</button>
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
        $(' tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idDokter = $(this).closest('.btnHapus').attr('idDokter');
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
                        url: 'dokter-hapus',
                        data: {
                            id_dokter: idDokter,
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
