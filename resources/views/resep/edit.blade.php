@extends('templates.layout')
@section('title', 'Edit Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Resep Obat
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Dokter</label>
                                    <input type="text" class="form-control" name="nama_pasien" value="{{ $resep->nama_pasien }}" />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembuatan Resep</label>
                                    <input type="date" class="form-control" name="tgl_pembuatan_resep" value="{{ $resep->tgl_pembuatan_resep }}" />
                                </div>
                              
                                <div class="form-group">
                                    <label>Diagnosis</label>
                                    <input type="text" class="form-control" name="diagnosis" value="{{ $resep->diagnosis }}" />
                                </div>
                                <div class="form-group">
                                    <label>Status Pengambilan Obat</label>
                                    <input type="text" class="form-control" name="status_pengambilan_obat" value="{{ $resep->nama_obat }}" />
                                </div>
                               
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="nama_obat" value="{{ $resep->no_rm }}"/>
                                </div>
                            </div>
                                @csrf
                                <div class="d-flex mt-3">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 4px;">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection