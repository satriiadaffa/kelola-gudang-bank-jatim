<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Atk</title>
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
          <div class="col-4">
            <div class="page-title">
                <i class="fa-solid fa-file-import"></i>
                <span>Laporan Atk</span>
            </div>
          </div>
          <div class="col-8">
          </div>
        </div>

        <div class="row">
            <div class="col table-container">
                <table class="table table-striped table-bordered data">
                    <thead>
                        <tr>			
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Kode GL</th>
                            <th>Saldo</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                            {{-- @if(Auth::user()->role !='Manager')
                            <th>Aksi</th>
                            @endif  --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($dataAtks as $dataAtk)
                            <tr>				
                                <td>{{$dataAtk->namaBarang}}</td>
                                <td>{{$dataAtk->kodeBarang}}</td>
                                <td>{{$dataAtk->kodeGL}}</td>
                                <td>{{$dataAtk->saldo}}</td>
                                <td>{{$dataAtk->satuanBarang}}</td>
                                <td>Rp. {{ number_format($dataAtk->hargaSatuan, 0, ',', '.') }},-</td>
                                @if(Auth::user()->role !='Manager')
                                <td class="buttons">
                                    <a href="{{url('/tambah-saldo-atk/'.$dataAtk->kodeBarang)}}">
                                        <div class="btn btn-success btn-tambah" title="Tambah Saldo {{$dataAtk->kodeBarang}}"><i class="fa-solid fa-plus"></i></div>
                                    </a>
                                    <a href="{{url('/edit-atk/'.$dataAtk->kodeBarang)}}" class="btn btn-secondary btn-aksi" title="Edit Data {{$dataAtk->kodeBarang}}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="{{ url('/hapus-atk/'.$dataAtk->kodeBarang) }}" class="btn btn-danger btn-hapus" title="Hapus Data {{$dataAtk->kodeBarang}}"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                        @endforeach --}}
                        <td>Nama Barang</td>
                        <td>Kode Barang</td>
                        <td>Kode GL</td>
                        <td>Saldo</td>
                        <td>Satuan</td>
                        <td>Harga Satuan</td>
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



