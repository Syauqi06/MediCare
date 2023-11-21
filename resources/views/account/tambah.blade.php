@extends('templates.layout')
@section('title', 'Tambah Account ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="">
                    <span class="h1">
                        Tambah Account
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" />
                                </div>

                                <label>Level</label><br>
                                <select name="Level" class="form-control">
                                    <option value="default" hidden>- pilih opsi -</option>
                                    <option value="Dokter">Dokter</option>
                                    <option value="Pasien">Pasien</option>
                                    <option value="Apoteker">Apoteker</option>
                                    <option value="Asisten dokter">Asisten dokter</option>
                                </select>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="password" class="form-control" name="password" />
                                </div>
                                @csrf
                                <div class="d-flex mt-3">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-right: 4px;">SIMPAN</button>
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
