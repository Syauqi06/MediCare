@extends('templates.layout')
@section('title', 'Daftar Rekam Medis')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1" style="color:#142a42; font-weight: bold;">
                        Data Rekam Medis
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="rekam-tambah">
                                <button class="btn btn-success">Tambah Data Rekam Medis</button>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA PASIEN</th>
                                    <th>NAMA DOKTER</th>
                                    <th>DIAGNOSA</th>
                                    <th>TANGGAL PEMERIKSAAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekam_medis as $rek)
                                    <tr>
                                        <td>{{ $rek->nama_pasien }}</td>
                                        <td>{{ $rek->nama_dokter}}</td>
                                        <td>{{ $rek->diagnosa}}</td>
                                        <td>{{ $rek->tgl_pemeriksaan}}</td>
                                        <td>
                                            <a href="rekam-edit/{{ $rek->id_rm }}"><button class="btn btn-warning">EDIT</button></a>
                                            <button class="btn btn-danger btnHapus" idRekam="{{ $rek->id_rm }}">HAPUS</button>
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
            let idRekam = $(this).closest('.btnHapus').attr('idRekam');
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
                            id_rm: idRekam,
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