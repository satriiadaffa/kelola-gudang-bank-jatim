<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retur Souvenir</title>
    <script type="text/javascript" src="{{url('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('DataTables/js/jquery.dataTables.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{url('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/beranda.css')}}">
    <link rel="stylesheet" href="{{url('css/formInput.css')}}">
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('image/icon.png')}}">
    @extends('staticView')
</head>
<body>
    @section('content')
    <div class="content-container">
        <div class="row">
          <div class="col">
            <div class="page-title">
                <i class="fa-solid fa-file-import"></i>
                <span>Retur Souvenir</span>
            </div>
          </div>
        </div>
        @if (session('message'))
          <div class="row">
            <div class="col-10">
                <div class="alert-con">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <label>{{ session('message') }}</label>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <form action="{{url('/kirim-retur-souvenir/'.$dataSouvenir->kodeBarang)}}" class="form" method="post"> 
            @csrf 
            <div class="row">
                <div class="col-6">
                    <div class="group">
                        <input type="text" readonly value="{{$dataRequestSouvenir->namaUnit}}" name="unit" id="unit">
                        <label class="select-label" for="unit">Unit</label>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="group">
                        <input type="text" readonly value="{{$dataSouvenir->kodeGL}})" name="kodeGL" id="kodeGL">
                        <label for="kodeGL">Kode GL</label>
                    </div> 
                </div>
                <div class="col-4">
                    <div class="group">
                    <input 
                    readonly
                    type="text"
                    value="{{$dataSouvenir->kodeBarang}}"
                    id="kodeBarang" 
                    name="kodeBarang" 
                    required>
                    <label for="kodeBarang">Kode Barang</label>
                    </div>
                </div>
            </div>
        <div class="row">
                <div class="col-10">
                    <div class="group">
                        <input 
                        readonly
                        type="text"
                        value="{{$dataSouvenir->namaBarang}}"
                        id="namaBarang" 
                        name="namaBarang" 
                        required>
                        <label for="namaBarang">Nama Barang</label>
                    </div> 
                </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="group">
                    <input 
                    placeholder="" 
                    value="{{$dataSouvenir->saldo}}"
                    type="text"
                    id="saldo" 
                    name="saldo" 
                    readonly
                    required>
                    <label for="saldo">Saldo</label>
                </div>
            </div>
            <div class="col-6">
                <div class="group">
                <input 
                placeholder="" 
                type="text"
                value="{{old('debet_retur')}}"
                id="debet_retur" 
                name="debet_retur" 
                required>
                <label for="debet_retur">Debet Retur</label>
                </div>
            </div>
        </div>
        @if (session('message-danger'))
          <div class="row">
            <div class="col-10">
                <div class="alert-con">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <label>{{ session('message-danger') }}</label>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-10">
                <input class="btn btn-danger btn-submit" type="submit" value="Kirim">
            </div>
        </div>
        
        </form>
    </div>
    @endsection 

</body>
</html>