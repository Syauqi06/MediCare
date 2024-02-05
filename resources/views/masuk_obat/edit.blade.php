@extends('templates.layout')
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
                                    <label>Nama Obat</label>
                                    <select name="id_obat" class="form-control">
                                    @foreach ($obatData as $t)
                                            <option value="{{ $t->id_obat }}"
                                                {{ $t->id_obat == $masuk_obat->id_obat ? 'selected' : '' }}>
                                                {{ $t->nama_obat }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" class="form-control" name="id_masuk_obat" value="{{ $masuk_obat->id_masuk_obat }}" />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Expired</label>
                                    <input type="date" class="form-control" name="tgl_expired" value="{{ $masuk_obat->tgl_expired }}"/>
                                </div>
                               <div class="form-group">
                                    <label>Jumlah Masuk</label>
                                    <input type="number" class="form-control" name="jumlah_masuk" value="{{ $masuk_obat->jumlah_masuk }}" />
                                </div>
                               <div class="form-group">
                                    <label>Tanggal Masuk Obat</label>
                                    <input type="date" class="form-control" name="tgl_masuk_obat" value="{{ $masuk_obat->tgl_masuk_obat }}"/>
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