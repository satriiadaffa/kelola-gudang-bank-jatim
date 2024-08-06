<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Kode</title>
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
                <span>Edit Kode</span>
            </div>
          </div>
        </div>
        <form action="{{url('/kirim-edit-kode/'.$dataKode->kode)}}" class="form" method="post">
            @csrf
        <div class="row">
            <div class="col-10">
                    <div class="group">
                    <input
                    value="{{$dataKode->kode}}"
                    placeholder="" 
                    type="text" 
                    id="kode" 
                    name="kode" 
                    required>
                    <label for="kode">Kode Kredit</label>
                    @error('kode')
        <div class="text-danger" id='error'>{{ $message }}</div>
        @enderror
                    </div>
            </div>
    </div>
    <div class="row">
        <div class="col-10">
                <div class="group">
                <input
                value="{{$dataKode->kode_debit}}"
                placeholder="" 
                type="text" 
                id="kode_debit" 
                name="kode_debit" 
                required>
                <label for="kode_debit">Kode Debit</label>
                @error('kode_debit')
        <div class="text-danger" id='error'>{{ $message }}</div>
        @enderror
                </div>
        </div>
</div>
    <div class="row">
        <div class="col-10">
                <div class="group">
                <input
                value="{{$dataKode->namaKode}}"
                placeholder="" 
                type="text" 
                id="namaKode" 
                name="namaKode" 
                required>
                <label for="namaKode">Nama Kode</label>
                @error('namaKode')
        <div class="text-danger" id='error'>{{ $message }}</div>
        @enderror
                </div>
        </div>
</div>
<div class="row">
    <div class="col-10">
        <div class="group">
            <select name="kategori" id="kategori">
                <option disabled value="" {{ old('kategori', $dataKode->kategori) == '' ? 'selected' : '' }}>--Pilih--</option>
                <option value="ATK" {{ old('kategori', $dataKode->kategori) == 'ATK' ? 'selected' : '' }}>Alat Tulis Kantor</option>
                <option value="Souvenir" {{ old('kategori', $dataKode->kategori) == 'Souvenir' ? 'selected' : '' }}>Souvenir</option>
            </select>
            <label class="select-label" for="kategori">Kategori</label>
            @error('kategori')
        <div class="text-danger" id='error'>{{ $message }}</div>
        @enderror
        </div> 
    </div>
</div>
    <div class="row">
        <div class="col-10">
            <input class="btn btn-danger btn-submit" onclick="prepareForm()" type="submit" value="Kirim">
        </div>
    </div>
        </form>
    </div>
    @endsection   
</body>
</html>



