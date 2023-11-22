@extends('template.layout')
@section('title', 'Tambah Masuk Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Masuk Obat
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Pasien</label>
                                    <select name="id_pasien" class="form-control">
                                        @foreach ($pasien as $t)
                                            <option value="{{ $t->id_pasien }}">{{ $t->nama_pasien }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pendaftaran</label>
                                    <input type="date" class="form-control" name="tgl_pendaftaran" />
                                    @csrf
                                </div>
                                <div class="form-group">
                                    <label>Nomor Antrian</label>
                                    <input type="Number" class="form-control" name="nomor_antrian" />
                                </div>
                                <div class="form-group">
                                    <label>Keluhan</label>
                                    <input type="text" class="form-control" name="keluhan" />
                                </div>
                                <div class="d-flex col-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();" style="margin-left: 10px;" class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
