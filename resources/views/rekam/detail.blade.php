@extends('templates.layout')
@section('title', 'Data Rekam Medis')
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
                        Detail Data Rekam Medis
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
                                                <td class="fw-bolder">Nama Dokter</td>
                                                <td>: {{ $rekam->nama_dokter }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Nama Pasien</td>
                                                <td>: {{ $rekam->nama_pasien }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Diagnosa</td>
                                                <td>: {{ $rekam->diagnosa }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Tanggal Pemeriksaan</td>
                                                <td>: {{ $rekam->tgl_pemeriksaan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="col-md-4 mt-3">
                                        <a href="#" onclick="window.history.back();"
                                            class="btn btn-danger">KEMBALI</a>
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
;
