<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Souvenir {{$namaUnit}}</title>
    <script type="text/javascript" src="{{asset('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('DataTables/js/jquery.dataTables.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/beranda.css')}}">
    <link rel="stylesheet" href="{{asset('css/formInput.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    @extends('staticView')
</head>
<body>
    @section('content')
    <div class="content-container">
        <div class="row">
          <div class="col">
            <div class="page-title">
                <i class="fa-solid fa-file-import"></i>
                <span>Laporan Souvenir {{$namaUnit}}</span>
            </div>
          </div>
          <div class="col">
          </div>
        </div>
        <div class="row">
            <div class="col table-container">
                <table class="table table-striped table-bordered data">
                    <thead>
                        <tr>			
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Debet</th>
                            <th>Peminta (NIP)</th>
                            <th>Tanggal (Tahun-Bulan-Hari | Jam)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataRequestSouvenirs as $dataRequestSouvenir)
                        <tr>
                            <td>{{$dataRequestSouvenir->kodeBarang}}</td>
                            <td>{{$dataRequestSouvenir->namaBarang}}</td>
                            <td>{{$dataRequestSouvenir->debet}}</td>
                            <td>{{$dataRequestSouvenir->namaUser}} ({{$dataRequestSouvenir->nip}})</td>
                            <td>{{$dataRequestSouvenir->created_at}}</td>
                        </tr>
                        @endforeach
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    @endsection    
</body>

<script type="text/javascript">
    $(document).ready(function(){
        $('.data').DataTable();
    });
    </script>
</html>



