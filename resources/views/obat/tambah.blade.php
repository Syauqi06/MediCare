@extends('templates.layout')
@section('title', 'Tambah Tipe Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1" style="font-weight: bold;">
                        Tambah Data Tipe Obat
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text" class="form-control" name="nama_obat" />
                                    @csrf
                                </div>
                                <div class="form-group">
                                    <label>Nama Tipe</label>
                                    <select name="id_tipe" class="form-control">
                                        @foreach ($tipe as $t)
                                            <option value="{{ $t->id_tipe }}">{{ $t->nama_tipe }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Stock Obat</label>
                                    <input type="text" class="form-control" name="stock_obat" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Obat</label>
                                    <input type="file" class="form-control" name="foto_obat" />
                                </div>
                                <div class="d-flex col-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();" class="margin btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
