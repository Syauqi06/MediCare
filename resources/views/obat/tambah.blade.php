@extends('templates.layout')
@section('title', 'Tambah Tipe Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1" style="font-weight: bold;">
                        Tambah Data Obat
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" value="{{ old('nama_obat')}}" name="nama_obat"/>
                                    @error('nama_obat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    @csrf
                                </div>
                                <div class="form-group">
                                    <label>Nama Tipe</label>
                                    <select name="id_tipe" class="form-control @error('id_tipe') is-invalid @enderror">
                                        @foreach ($tipe as $t)
                                            <option value="{{ $t->id_tipe }}" {{old('id_tipe', request('id_tipe')) == $t->id_tipe ? 'selected' : ''}}>{{ $t->nama_tipe }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_tipe')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Stock Obat</label>
                                    <input type="text" class="form-control @error('stock_obat') is-invalid @enderror" value="{{ old('stock_obat')}}" name="stock_obat" />
                                    @error('stock_obat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Foto Obat</label>
                                    <input type="file" class="form-control @error('foto_obat') is-invalid @enderror" value="{{ old('foto_obat')}}" name="foto_obat" />
                                    @error('foto_obat')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-flex col-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;">SIMPAN</button>
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
