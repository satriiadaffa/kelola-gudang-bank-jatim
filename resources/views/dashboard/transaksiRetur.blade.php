<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi Retur</title>
    <script type="text/javascript" src="{{url('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('DataTables/js/jquery.dataTables.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{url('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/beranda.css')}}">
    <link rel="stylesheet" href="{{url('css/tabel.css')}}">
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}">
    @extends('staticView')
</head>
<body>
    @section('content')
    <div class="content-container">
        <div class="row">
            <div class="col-9">
              <div class="page-title">
                <i class="fa-solid fa-right-from-bracket"></i>
                  <span>Transaksi Retur</span>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col table-container" style="border-top-left-radius: 0px;">
                <table class="table table-striped table-bordered data">
                    <thead>
                        <tr>			
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Unit</th>
                            <th>Tipe</th>
                            <th>Debet Retur</th>
                            <th>Tanggal Request</th>
                            <th>Request Oleh (NIP)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>				
                                <td>{{$data->namaBarang}}</td>
                                <td>{{$data->kodeBarang}}</td>
                                <td>{{$data->unit}}</td>
                                <td>{{$data->tipe}}</td>
                                <td>{{$data->debet_retur}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->namaUser}} ({{$data->nip}})</td>
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