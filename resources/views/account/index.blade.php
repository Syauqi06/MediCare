@extends('templates.layout')
@section('title', 'Daftar account')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">
                        Account
                    </span>
                </div>
                <div class="col-md-4">
                    <a href="data/tambah">
                        <button class="btn btn-success">Tambah Account</button>
                    </a>
                </div>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($pasien as $p) --}}
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <td>

                                            <a href="data/edit/"><button class="btn btn-primary">EDIT</button></a>

                                            <button class="btn btn-danger btnHapus" idPasien="">HAPUS</button>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
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
            let idPasien = $(this).closest('.btnHapus').attr('idPasien');
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
                        url: 'data/hapus',
                        data: {
                            id_pasien: idPasien,
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