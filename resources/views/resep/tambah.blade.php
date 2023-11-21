@extends('templates.layout')
@section('title', 'Tambah Resep Dokter ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Resep Dokter
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group">
                                <label>Nomor Rekam Medis</label>
                                <select name="id_rm" id="id_rm" class="form-control" required>
                                    <option value="" selected disabled>Pilih Rekam Medis</option>
                                @foreach ($rekam_medis as $rek)
                                    <option value="{{ $rek->id_rm }}">{{ $rek->id_rm }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Dokter</label>
                                <select name="id_dokter" id="id_dokter" class="form-control" required>
                                    <option value="" selected disabled>Pilih Dokter Yang Menangani</option>
                                @foreach ($dokter as $d)
                                    <option value="{{ $d->id_dokter }}">{{ $d->id_dokter }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pembuatan Resep</label>
                                <input type="date" class="form-control" name="tgl_pembuatan_resep" id="tgl_pembuatan_resep"/>
                            </div>
                            <div class="form-group">
                                <label>Status Pengambilan Obat</label>
                                <input type="text" class="form-control" name="status_pengambilan_obat" />
                            </div>
                        </div>
                        @csrf
                        <div class="d-flex mt-3">
                            <button type="submit" class="btn btn-success" style="margin-right: 4px;">SIMPAN</button>
                            <a href="#" onclick="window.history.back();" class="btn btn-danger">KEMBALI</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection