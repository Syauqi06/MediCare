@extends('templates.layout')
@section('title', 'Data Obat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="font-weight: bold;">
                        Data Obat
                    </span>
                    
                </div>
                <div class="card-header d-flex justify-content-between">
                    <span class="h5">
                        Jumlah Obat Yang Tercatat : {{$jumlahObat}}
                    </span>
                    <a href="obat/cetak">
                        <btn class="btn btn-success ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:black}</style><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>Cetak PDF
                        </btn>
                    </a>
                </div>
                            <hr>
                            <div class="col-md-4 mb-3 d-flex">
                                <a href="obat/tambah">
                                    <btn class="btn btn-success">Tambah Obat</btn>
                                </a>
                            </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>NAMA OBAT</th>
                                    <th>TIPE OBAT</th>
                                    <th>JUMLAH STOCK</th>
                                    <th>FOTO OBAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obat as $o)
                                    <tr>
                                        <td>{{ $o->nama_obat }}</td>
                                        <td>{{ $o->nama_tipe }}</td>
                                        <td>{{ $o->stock_obat }}</td>
                                        <td> 
                                        @if ($o->foto_obat)
                                            <img src="{{ url('foto') . '/' . $o->foto_obat }} "
                                                style="max-width: 250px; height: auto;" />
                                        @endif
                                    </td>
                                        <td>
                                            <a href="obat/detail/{{ $o->id_obat }}"><btn class="btn btn-info">Detail</btn></a>
                                            <a href="obat/edit/{{ $o->id_obat }}"><btn class="btn btn-primary">EDIT</btn></a>
                                            <btn class="btn btn-danger btnHapus" idObat="{{ $o->id_obat }}">HAPUS</btn>
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
            let idObat = $(this).closest('.btnHapus').attr('idObat');
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
                        url: 'obat/hapus',
                        data: {
                            id_obat: idObat,
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