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
                            <hr>
                            <div class="col-md-4 mb-3">
                                <a href="obat/tambah">
                                    <btn class="btn btn-success">Tambah Obat</btn>
                                </a>
                            </div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>NAMA OBAT</th>
                                    <th>TIPE OBAT</th>
                                    <th>STOCK OBAT</th>
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