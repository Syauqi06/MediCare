@extends('templates.layout')
@section('title', 'Dashboard')
@section('content')
<div class="container align-item-center ml-5" style="margin-top: 1rem;">
  <div>
      <h1 style="color: Black; font-size:50px;">Dashboard</h1>
  </div>
  <div class="d-flex">
    @if (Auth::check())
      <h3 style="color: black; margin-right: 1%; font-size:50px;">Welcome, {{auth()->user()->username}}</h3><h3 style="color: rgb(60, 60, 138);"></h3>
    @endif
  </div>
<div class="justify-content-center row mx-0" style="margin-top: 50px;">
  <div class="card mb-3 m-0 col me-2" style="max-width: 18rem; border-radius: 10px; background-color:white">
      <div class="card-body" style="text-align: center;">
        <h2 class="card-title" ><i class="fa fa-briefcase fa-lg" style="font-size: 70px;" aria-hidden="true"></i></h2><br>
        <h6 class="card-text" style="font-size: 25px"><b>Jumlah Data Pasien</b></h6>
        <h1 class="fw-bold">{{$jumlahPasien}}</h1>
      </div>
  </div>
  <div class="card mb-3 m-0 col me-2" style="max-width: 18rem; border-radius: 10px; background-color:white; ">
      <div class="card-body" style="text-align: center;">
        <h2 class="card-title"><i class="fa fa-book fa-lg" style="font-size: 70px;" aria-hidden="true"></i></h2><br>
        <h6 class="card-text" style="font-size: 25px"><b>Jumlah Pendaftaran</b></h6>
        <h1 class="fw-bold">{{$jumlahPendaftaran}}</h1>
      </div>
  </div>
  <div class="card mb-3 m-0 col me-2" style="max-width: 18rem; border-radius: 10px; background-color:white">
      <div class="card-body" style="text-align: center;">
        <h2 class="card-title"><i class="fa fa-money fa-lg" style="font-size: 70px;" aria-hidden="true"></i></h2><br>
        <h6 class="card-text" style="font-size: 25px"><b>Jumlah Rekam Medis</b></h6>
        <h1 class="fw-bold">{{$jumlahRekam}}</h1>
      </div>
  </div>
  <div class="card mb-3 m-0 col" style="max-width: 18rem; border-radius: 10px; background-color:white">
      <div class="card-body" style="text-align: center;">
        <h2 class="card-title"><i class="fa fa-minus-circle fa-lg" style="font-size: 70px;" aria-hidden="true"></i></h2><br>
        <h6 class="card-text" style="font-size: 25px"><b>Jumlah Resep Obat</b></h6>
        <h1 class="fw-bold">{{$jumlahResep}}</h1>
      </div>
  </div>
</div>
</div>
@endsection