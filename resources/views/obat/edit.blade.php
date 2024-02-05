@extends('templates.layout')
@section('title', 'Edit Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Obat
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text" class="form-control" name="nama_obat" value="{{ $obat->nama_obat }}" />
                                    <input type="hidden" class="form-control" name="id_obat" value="{{ $obat->id_obat }}" />
                                </div>
                               <div class="form-group">
                                    <label>Tipe Obat</label>
                                    <select name="id_tipe" class="form-control">
                                    @foreach ($tipeObat as $t)
                                            <option value="{{ $t->id_tipe }}"
                                                {{ $t->id_tipe == $obat->id_tipe ? 'selected' : '' }}>
                                                {{ $t->nama_tipe }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label>Stock Obat</label>
                                    <input type="number" class="form-control" name="stock_obat" value="{{ $obat->stock_obat }}" />
                                </div>
                               <div class="form-group">
                                    <label>Foto Obat</label>
                                    <input type="file" class="form-control" name="foto_obat" />
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