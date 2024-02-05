@extends('templates.layout')
@section('title', 'Edit account ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Account
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="nama_pasien" value="{{ $pasien->nama_pasien }}" />
                                </div>
                                <label>Roles</label><br>
                                <select name="jenis_kelamin" class="form-control" value="{{ $pasien->jenkel }}">
                                    <option value="laki-laki" {{ $pasien->jenkel == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="perempuan" {{ $pasien->jenkel == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="date" class="form-control" name="tgl_lahir" value="{{ $pasien->tgl_lahir }}" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_pasien" value="{{ $pasien->id_pasien }}"/>
                                </div>
                                </div>
                                @csrf
                                <div class="d-flex mt-3">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 4px;">SIMPAN</button>
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