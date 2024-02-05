@extends('templates.layout')
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
                                    <label>Nama Obat</label>
                                    <select name="id_obat" class="form-control">
                                        @foreach ($obat as $t)
                                            <option value="{{ $t->id_obat }}">{{ $t->nama_obat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Expired</label>
                                    <input type="date" class="form-control" name="tgl_expired" />
                                    @csrf
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Masuk</label>
                                    <input type="number" class="form-control" name="jumlah_masuk" />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Masuk Obat</label>
                                    <input type="date" class="form-control" name="tgl_masuk_obat" />
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
