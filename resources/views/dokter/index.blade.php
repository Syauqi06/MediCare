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
                                            <a href="dokter/detail/{{ $o->id_dokter }}">
                                                <btn class="btn btn-info">Detail</btn>
                                            </a>
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
