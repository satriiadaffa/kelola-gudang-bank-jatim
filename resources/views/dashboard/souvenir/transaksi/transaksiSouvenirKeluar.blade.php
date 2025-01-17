<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi Souvenir Keluar</title>
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
            <div class="col-9">
              <div class="page-title">
                <i class="fa-solid fa-right-from-bracket"></i>
                  <span>Transaksi Souvenir Keluar</span>
              </div>
            </div>
            <div class="col-3">
                <a href="/transaksi-souvenir-masuk" class="btn btn-success">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>Transaksi Souvenir Masuk</span>
                </a>
              </div>
              <div class="row">
                <a href="" class="col-3 btn btn-secondary" style="border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Request Unit</span>
                </a>
                <a href="/rekaman-penghapusan-souvenir" class="col-3 btn btn-light" style="border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Rekaman Penghapusan</span>
                </a>
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
                            <th>Debet</th>
                            <th>Tanggal Request</th>
                            <th>Request Oleh (NIP)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>				
                                <td>{{$data->namaBarang}}</td>
                                <td>{{$data->kodeBarang}}</td>
                                <td>{{$data->namaUnit}}</td>
                                <td>{{$data->debet}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->namaUser}} ({{$data->nip}})</td>
                                <td class="text-center">
                                    <a href="{{url('/retur-saldo-souvenir/'.$data->kodeBarang.'/'.$data->id)}}">
                                        <div class="btn btn-warning" title="Retur Saldo {{$data->kodeBarang}}"><i class="fa-solid fa-minus"></i></div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('.data').DataTable();
        });
    </script>
</body>
</html>