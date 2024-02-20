@extends('templates.layout')
@section('title', 'Edit Rekam Medis ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Rekam Medis
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_rm" value="{{ $rekam->id_rm }}" />
                                    <label>Nama Pasien</label>
                                    <select name="id_pasien" id="id_pasien" class="form-control" required>
                                        <option value="">Pilih Pasien</option>
                                        @foreach ($pasien as $a)
                                            <option value="{{ $a->id_pasien }}" <?php
                                            if ($a->id_pasien == $rekam->id_pasien) {
                                                echo 'selected';
                                            }
                                            ?>>{{ $a->nama_pasien }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Dokter</label>
                                    <select name="id_dokter" id="id_dokter" class="form-control" required>
                                        <option value="">Pilih Dokter</option>
                                        @foreach ($dokter as $d)
                                            <option value="{{ $d->id_dokter }}" <?php
                                            if ($d->id_dokter == $rekam->id_dokter) {
                                                echo 'selected';
                                            }
                                            ?>>{{ $d->nama_dokter }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pemeriksaan</label>
                                    <input type="date" class="form-control" name="tgl_pemeriksaan"
                                        value="{{ $rekam->tgl_pemeriksaan }}" />
                                </div>
                                <div class="form-group">
                                    <label>Diagnosis</label>
                                    <input type="text" class="form-control" name="diagnosa"
                                        value="{{ $rekam->diagnosa }}" />
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
