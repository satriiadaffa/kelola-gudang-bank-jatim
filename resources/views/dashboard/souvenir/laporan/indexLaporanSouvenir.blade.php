<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Souvenir</title>
    <script type="text/javascript" src="{{asset('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('DataTables/js/jquery.dataTables.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/beranda.css')}}">
    <link rel="stylesheet" href="{{asset('css/formInput.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('image/icon.png')}}">
    @extends('staticView')
</head>
<body>
    @section('content')
    <div class="content-container">
        <div class="row">
          <div class="col-4">
            <div class="page-title">
                <i class="fa-solid fa-file-import"></i>
                <span>Laporan Souvenir</span>
            </div>
          </div>
          <div class="col">
          </div>
          <div class="col-2">
            <a class="btn btn-danger"href="{{url('/laporan-souvenir/all')}}">
                <i class="fa-solid fa-table"></i>
                <span>Laporan Keseluruhan</span>
            </a>
          </div>
        </div>
        <div class="row">
            <div class="col table-container">
                <table class="table table-striped table-bordered data">
                    <thead>
                        <tr>			
                            <th>Nama Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataUnits as $dataUnit)
                        <tr>
                            <td>{{$dataUnit->namaUnit}}</td>
                            <td>
                                <a class="btn btn-outline-info"href="{{url('/laporan-souvenir/'.$dataUnit->kodeUnit)}}">
                                    <i class="fa-solid fa-eye"></i>
                                    <span>Lihat data</span>
                                </a>
                            </td>
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



