@extends('template.layout')
@section('title', 'History')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="">
            <div class="card-header">
                <span class="h1"  style="font-weight: bold;">
                    History
                </span>
                <hr>
            </div>
            <br>
            <div class="card-body">
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                                    @foreach ($logs as $log)
                                    <div class="card" style=" padding:10px;  ">
                                        <span class="h3">Tabel : {{ $log->tabel }}</span >
                                        <div>
                                        <span >Tanggal : {{ $log->tanggal }} </span >
                                        <span >Waktu : {{ $log->jam }} </span >
                                        <span >Aksi : {{ $log->aksi }} </span >
                                        <span >Status : {{ $log->record }}</span >
                                        </div>
                                    </div>
                                    <br>
                                    @endforeach
                                
                        </div>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
    document.getElementById('checkAll').addEventListener('click', function() {
        var checkbox = document.querySelectorAll('.checkbox');
        for (var i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = !checkbox[i].checked;
        }
    })
</script>
@endsection