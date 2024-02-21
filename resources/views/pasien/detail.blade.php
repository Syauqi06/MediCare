@extends('templates.layout')
@section('title', 'Data Obat')
@section('content')
<style>
    table{
        border:1px solid transparent !important;
    }
</style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1" style="font-weight: bold;">
                    Detail Data pasien
                    </span>
                </div>
                <hr>
                <div>
                <div class="">
                    <div class="card-body m-0">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="container">
                                    {{-- @foreach ($pasien as $p) --}}
                                        {{-- @if ($o->foto_obat) --}}
                                        <div class="photo-container" style="margin-top:-20px">
                                            <br>
                                            @if (isset($pasien->foto_profil) && $pasien->foto_profil != '')
                                            <img src="{{ url('foto') . '/' . $pasien->foto_profil }}" style="max-width: 150px; height: auto;" />
                                        @endif
                                            
                                         </div>
                                        {{-- @endif --}}
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-bolder">Nama Pasien</td>
                                                    <td>: {{ $pasien->nama_pasien }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Jenis Kelamin</td>
                                                    <td>: {{ $pasien->jenis_kelamin }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Tanggal Lahir</td>
                                                    <td>: {{ $pasien->tgl_lahir }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Alamat</td>
                                                    <td>: {{ $pasien->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">No Telepon</td>
                                                    <td>: {{ $pasien->no_telp }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">BPJS</td>
                                                    <td>: {{ $pasien->no_bpjs }}</td>
                                                </tr>
                                    {{-- @endforeach --}}
                                            </tbody>
                                        </table>
                                        <div class="col-md-4 mt-3">
                                            <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class=""> 
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection
