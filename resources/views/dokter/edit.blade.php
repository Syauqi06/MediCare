@extends('templates.layout')
@section('title', 'Edit Dokter ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Dokter
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <input type="text" class="form-control" name="id_dokter" value="{{ $dokter->id_dokter }}" hidden/>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Dokter</label>
                                    <input type="text" class="form-control" name="nama_dokter" value="{{ $dokter->nama_dokter }}" />
                                </div>
                                <div class="form-group">
                                    <label>Nama Poli</label>
                                    <select name="id_poli" class="form-control">
                                        @foreach ($poli as $p)
                                            <option value="{{ $p->id_poli }}"
                                                {{ $p->id_poli == $p->id_poli ? 'selected' : '' }}>
                                                {{ $p->jenis_poli }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="number" class="form-control" name="no_telp" value="{{ $dokter->no_telp }}" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Dokter</label>
                                    <br>
                                    <img id="pic" src="{{ url('foto') . '/' . $dokter->foto_dokter}}" height="100px" class="my-2" alt="Preview Image">
                                    <input type="file" class="form-control" name="foto_dokter" 
                                    oninput="pic.src=window.URL.createObjectURL(this.files[0])"/>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_dokter" value="{{ $dokter->id_dokter }}"/>
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