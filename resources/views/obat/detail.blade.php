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
            <div class="">
                <div class="card-header">
                    <span class="h1" style="font-weight: bold;">
                    Detail Data Obat
                    </span>
                </div>
                <hr>
                <div>
                <div class="card">
                    <div class="card-body m-0">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="container">
                                    @foreach ($obat as $o)
                                        {{-- @if ($o->foto_obat) --}}
                                        <div class="photo-container" style="margin-top:-20px">
                                            <br>
                                            <img src="{{ url('foto') . '/' . $o->foto_obat }} "style="max-width: 170px; height: auto;" />
                                         </div>
                                        {{-- @endif --}}
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-bolder">Nama Obat</td>
                                                    <td>: {{$o->nama_obat}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Tipe Obat</td>
                                                    <td>: {{$o->nama_tipe}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Stok Obat</td>
                                                    <td>: {{$o->stock_obat}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-md-4 mt-3">
                                            <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                                        </div>
                                    </div>
                                    @csrf
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"> 
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection
