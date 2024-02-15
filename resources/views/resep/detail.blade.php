@extends('templates.layout')
@section('title', 'Data Resep Obat')
@section('content')
    <style>
        table {
            border: 1px solid transparent !important;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1 font-weight-bold">
                        Detail Data Resep Obat
                    </span>
                </div>
                <hr>

                <div class="card-body m-0">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="container">
                                    <table class="table table-bordered mt-3">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bolder">Nomor Rekam Medis</td>
                                                <td>: {{ $resep->id_rm }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Nama Dokter</td>
                                                <td>: {{ $resep->nama_dokter }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Tipe Obat</td>
                                                <td>: {{ $resep->nama_tipe }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Tanggal Pembuatan Resep</td>
                                                <td>: {{ $resep->tgl_pembuatan_resep }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Status Pengambilan Obat</td>
                                                <td>: {{ $resep->status_pengambilan_obat }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="col-md-4 mt-3">
                                        <a href="#" onclick="window.history.back();"
                                            class="btn btn-success">KEMBALI</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection
