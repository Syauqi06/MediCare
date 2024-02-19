@extends('templates.layout')
@section('title', 'Detail Data Obat')
@section('content')             
    <div class="container mt-5 align-item-center" style="background-repeat: no-repeat; background-size: cover; background-position: center;">
      <div class="text-center">
        @foreach ($obat as $o)
        <h2 class="text-black"><b>Detail Data {{$o->nama_obat}}</b></h2>
      </div>
        <div class="card" style="width: 40rem; margin:auto; border-radius: 2.862254025044723vh; margin-bottom: 14.311270125223613vh; background-color:white;">
            <div class="card-body">  
                <main>
                <div class="box-detail">
                <div class="box-txt d-flex">
                    <div class="col-4" style="text-align: center; padding-top: 20px;"> 
                      @if($o->foto_obat)
                          <img src="{{ url('foto') . '/' . $o->foto_obat }} "
                              style="max-width: 100%; max-height:100%; border-radius: 5%;" />
                      @endif

                        <button type="button" class="btn" style="margin-top: 55px;">
                            <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a></button>   
                    </div>
                
                    <div class="col-7" style="width: 25%; margin-left: 50px; margin-top: 3%;" >
                        <h6 class="text-info" style="color: #4378ff;"><b>Nama</b></h6>
                            <p class="text-detail text-dark">{{$o->nama_obat}}</p>
                        <h6 class="text-info" style="color: #4378ff;"><b>Tipe Obat</b></h6>
                            <p class="text-detail text-dark">{{$o->nama_tipe}}</p>
                        <h6 class="text-info " style="color: #4378ff;"><b>Jumlah Stock</b></h6>
                            <p class="text-detail text-dark">{{$o->stock_obat}}</p>
                    </div>
                    @endforeach
                </div>
                </div>
                </main>
                   
            </div>
        </div>
    </div>
      </div> 
@endsection