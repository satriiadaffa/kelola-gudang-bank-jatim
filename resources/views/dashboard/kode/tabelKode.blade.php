<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabel Kode</title>
    <script type="text/javascript" src="{{url('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('DataTables/js/jquery.dataTables.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{url('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/beranda.css')}}">
    <link rel="stylesheet" href="{{url('css/tabel.css')}}">
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
                  <i class="fa-solid fa-pencil"></i>
                  <span>Tabel Kode</span>
              </div>
            </div>
          </div>
          @if (session('message'))
          <div class="row">
            <div class="col">
                <div class="alert-con">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <label>{{ session('message') }}</label>
                    </div>
                </div>
            </div>
        </div>
        @elseif (session('message-delete'))
          <div class="row">
            <div class="col">
                <div class="alert-con">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <label>{{ session('message-delete') }}</label>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col table-container">
                <table class="table table-striped table-bordered data">
                    <thead>
                        <tr>			
                            <th>Kode Kredit</th>
                            <th>Kode Debit</th>
                            <th>Nama Kode</th>
                            <th>Kategori</th>
                            @if(Auth::user()->role !='manager')
                            <th>Aksi</th>
                            @endif 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataKodes as $dataKode)
                            <tr>				
                                <td>{{$dataKode->kode}}</td>
                                <td>{{$dataKode->kode_debit}}</td>
                                <td>{{$dataKode->namaKode}}</td>
                                <td>{{$dataKode->kategori}}</td>
                                @if(Auth::user()->role !='manager')
                                <td class="buttons">
                                    <a href="{{url('/edit-kode/'.$dataKode->kode)}}" class="btn btn-secondary btn-aksi" title="Edit Data {{$dataKode->kode}}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="{{ url('/hapus-kode/'.$dataKode->kode) }}" class="btn btn-danger btn-hapus" title="Hapus Data {{$dataKode->kode}}"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    @endsection
    <script type="text/javascript">
        $(document).ready(function(){
            $('.data').DataTable();
        });
    </script>
</body>
</html>