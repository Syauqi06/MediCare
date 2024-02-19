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
                        <div class="card-header d-flex justify-content-between">
                            <span class="h5">
                                Jumlah Resep Obat Yang Tercatat : {{ $jumlahResep }}
                            </span>
                            <a href="resep/cetak">
                                <btn class="btn btn-success ml-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <style>
                                            svg {
                                                fill: #ffffff
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
                            @if (Auth::check() && Auth::user()->role == 'asisten')
                            <a href="resep-tambah">
                                <button class="btn btn-success">Tambah Data Resep Obat</button>
                            </a>
                            @endif
                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NOMOR REKAM MEDIS</th>
                                    <th>NAMA DOKTER</th>
                                    <th>TIPE OBAT</th>
                                    <th>TANGGAL PEMBUATAN RESEP</th>
                                    <th>STATUS PENGAMBILAN OBAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resep_obat as $res)
                                    <tr>
                                        <td>{{ $res->id_rm }}</td>
                                        <td>{{ $res->nama_dokter }}</td>
                                        <td>{{ $res->nama_tipe }}</td>
                                        <td>{{ $res->tgl_pembuatan_resep }}</td>
                                        <td>{{ $res->status_pengambilan_obat }}</td>
                                        <td class="d-flex">
                                            <a href="resep-detail/{{ $res->id_resep }}"><button
                                                    class="btn btn-info">DETAIL</button></a>
                                            @if (Auth::check() && Auth::user()->role == 'asisten')
                                            <a href="resep-edit/{{ $res->id_resep }}"><button
                                                    class="btn btn-warning mx-2">EDIT</button></a>
                                            @endif
                                            
                                            <button class="btn btn-danger btnHapus"
                                                idResep="{{ $res->id_resep }}">HAPUS</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br />
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
                        url: 'resep-hapus',
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
