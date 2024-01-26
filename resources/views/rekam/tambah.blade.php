@extends('templates.layout')
@section('title', 'Tambah Rekam Medis ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1">
                        Tambah Rekam Medis
                    </span>
                </div>
                <br>
                <div class="card-body">
                    <form method="POST" action="rekam-simpan" enctype="multipart/form-data">
                        <div class="row">
                                <div class="form-group">
                                    <label>Nama Pasien</label>
                                    <select name="id_pasien" id="id_pasien" class="form-control" required>
                                        <option value="">Pilih Pasien</option>
                                    @foreach ($pasien as $a)
                                        <option value="{{ $a->id_pasien }}">{{ $a->nama_pasien }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Dokter</label>
                                    <select name="id_dokter" id="id_dokter" class="form-control" required>
                                        <option value="">Pilih Dokter</option>
                                        @foreach ($dokter as $d)
                                        <option value="{{ $d->id_dokter }}">{{ $d->nama_dokter }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pemeriksaan</label>
                                    <input type="date" class="form-control" name="tgl_pemeriksaan" />
                                </div>
                                <div class="form-group">
                                    <label>Diagnosis</label>    
                                    <textarea name="diagnosa" class="form-control" id="" cols="30" rows="10"></textarea>
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