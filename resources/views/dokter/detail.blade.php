@extends('templates.layout')
@section('title', 'Data Dokter')
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
                        Detail Data Dokter
                    </span>
                </div>
                <hr>

                <div class="card-body m-0">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="container">
                                    <div class="photo-container" style="margin-top: -20px">
                                        <br>
                                        <img src="{{ url('foto') . '/' . $dokter->foto_dokter }}"
                                            style="max-width: 170px; height: auto;" />
                                    </div>

                                    <table class="table table-bordered mt-3">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bolder">Nama Poli</td>
                                                <td>: {{ $dokter->jenis_poli }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">Nama Dokter</td>
                                                <td>: {{ $dokter->nama_dokter }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bolder">No Telp</td>
                                                <td>: {{ $dokter->no_telp }}</td>
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
