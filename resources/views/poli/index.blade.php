@extends('templates.layout')
@section('title', 'Daftar Poli')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Poli
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-header d-flex justify-content-between">
                            <span class="h5">
                                Jumlah Poli Yang Tercatat : {{ $jumlahPoli }}
                            </span>
                            
                        </div>
                        <hr>
                        <div class="col-md-4">
                            <a href="poli-tambah">
                                <button class="btn btn-success">Tambah Poli</button>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>JENIS POLI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($poli as $p)
                                    <tr>
                                        <td>{{ $p->jenis_poli }}</td>
                                        <td>
                                            <a href="poli-edit/{{ $p->id_poli }}">
                                                <button class="btn btn-warning">EDIT</button>
                                            </a>
                                            <button class="btn btn-danger btnHapus"
                                                idPoli="{{ $p->id_poli }}">HAPUS</button>

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
            let idPoli = $(this).closest('.btnHapus').attr('idPoli');
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
                        url: 'poli-hapus',
                        data: {
                            id_poli: idPoli,
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
