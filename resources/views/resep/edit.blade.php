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
                                    <label>Nomor Rekam Medis</label>
                                    <select name="id_rm" id="id_rm" class="form-control" required>
                                        <option value="">Pilih Rekam Medis</option>
                                    @foreach ($rekam as $rek)
                                        <option value="{{ $rek->id_rm }}" <?php 
                                        if ($rek->id_rm == $resep->id_rm) {
                                            echo "selected";
                                        }
                                        ?>>{{ $rek->id_rm }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Dokter</label>
                                    <select name="id_dokter" id="id_dokter" class="form-control" required>
                                    @foreach ($dokter as $rek)
                                        <option value="{{ $rek->id_dokter }}" <?php 
                                        if ($rek->id_dokter == $resep->id_dokter) {
                                            echo "selected";
                                        }
                                        ?>>{{ $rek->nama_dokter }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Obat</label>
                                    <select name="id_tipe" id="id_tipe" class="form-control" required>
                                    @foreach ($tipe as $rek)
                                        <option value="{{ $rek->id_tipe }}" <?php 
                                        if ($rek->id_tipe == $resep->id_tipe) {
                                            echo "selected";
                                        }
                                        ?>>{{ $rek->nama_tipe }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembuatan Resep</label>
                                    <input type="date" class="form-control" name="tgl_pembuatan_resep" value="{{ $resep->tgl_pembuatan_resep }}" />
                                </div>
                                <div class="form-group">
                                    <label>Status Pengambilan Obat</label>
                                    <input type="text" class="form-control" name="status_pengambilan_obat" value="{{ $resep->status_pengambilan_obat }}" />
                                </div>
                               
                            </div>
                                @csrf
                                <div class="d-flex mt-3">
                                    <button type="submit" class="btn btn-success" style="margin-right: 4px;">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();" class="btn btn-danger">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection