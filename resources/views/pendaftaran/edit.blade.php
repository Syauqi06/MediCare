@extends('template.layout')
@section('title', 'Edit Masuk Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Masuk Obat
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Pendaftar</label>
                                    <select name="id_pasien" class="form-control">
                                    @foreach ($pasien as $t)
                                            <option value="{{ $t->id_pasien }}"
                                                {{ $t->id_pasien == $pendaftaran->id_pasien ? 'selected' : '' }}>
                                                {{ $t->nama_pasien }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" class="form-control" name="id_pendaftaran" value="{{ $pendaftaran->id_pendaftaran }}" />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pendaftaran</label>
                                    <input type="date" class="form-control" name="tgl_pendaftaran" value="{{ $pendaftaran->tgl_pendaftaran }}"/>
                                </div>
                               <div class="form-group">
                                    <label>Nomor Antrian</label>
                                    <input type="number" class="form-control" name="nomor_antrian" value="{{ $pendaftaran->nomor_antrian }}" />
                                </div>
                               <div class="form-group">
                                    <label>Keluhan</label>
                                    <input type="text" class="form-control" name="keluhan" value="{{ $pendaftaran->keluhan }}" />
                                </div>
                                </div>
                                @csrf
                                <div class="d-flex mt-3">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;">SIMPAN</button>
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