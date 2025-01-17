<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabel ATK {{$yearMonth}}</title>
    <script type="text/javascript" src="{{asset('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/buttons.print.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/buttons.dataTables.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/beranda.css')}}">
    <link rel="stylesheet" href="{{asset('css/tabel.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('image/icon.png')}}">
</head>
<body>
    <div class="container-page-table">
        <div class="row">
            <div class="col-11">
              <div class="page-title">
                  <i class="fa-solid fa-pencil"></i>
                  <span>Tabel ATK {{$yearMonth}}</span>
              </div>
            </div>
            <div class="col-1">
                <a class="btn btn-danger"href="{{url('/laporan-atk/index')}}">
                    <i class="fa-solid fa-angles-left"></i>
                    <span>Kembali</span>
                </a>
              </div>
          </div>
        <div class="row">
            <div class="col table-container">
                <table class="table table-striped table-bordered data hover" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>		
                            <th>Jenis barang</th>
                            <th>Kode GL</th>
                            <th>Satuan Barang</th>
                            <th>Harga Satuan</th>
                            <th>Saldo Awal</th>
                            <th>Debet</th>
                            @foreach($requestDebetNesteds as $unitDebet)
                            <th>{{ $unitDebet[0]['namaUnit'] }}</th>
                            @endforeach
                            <th>Jumlah Penggunaan</th>
                            <th>Harga Penggunaan</th>
                            <th>Jumlah Saldo Akhir</th>
                            <th>Harga Saldo Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataAtks as $index => $dataAtk)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td> 
                                <td>{{$dataAtk->kodeBarang}}</td>	
                                <td>{{$dataAtk->namaBarang}}</td>
                                <td>{{$dataAtk->kodeGL}}</td>
                                <td>{{$dataAtk->satuanBarang}}</td>
                                <td>Rp. {{ number_format($dataAtk->hargaSatuan, 0, ',', '.') }},-</td>
                                <td>{{$saldoAwals[$index]}}</td>
                                <td>{{$tambahSaldos[$index]}}</td>
                                @foreach($requestDebetNesteds as $unitDebet)
                                <th>{{ $unitDebet[$index]['totalDebet'] }}</th>
                                @endforeach
                                <td>{{$totalRequests[$index]}}</td>
                                <td>Rp. {{ number_format($totalPenggunaans[$index], 0, ',', '.') }},- </td>
                                <td>{{$dataAtk->saldo}}</td>
                                <td>Rp. {{ number_format($totalSaldoAkhirs[$index], 0, ',', '.') }},- </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        
        <div class="row" style="margin-top:25px">
            <div class="col table-container">
                <table class="table table-striped table-bordered data-kode hover" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Penggunaan</th>	
                            <th>Sisa Persediaan</th>
                            <th>Saldo GL</th>
                            <th>Selisih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kodeGLs as $index => $kodeGL)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td> 
                                <td>{{$kodeGL->kodeGabungan}}</td>
                                <td>Rp. {{ number_format($totalPenggunaanAkhirs[$index], 0, ',', '.') }},- </td>
                                <td>Rp. {{ number_format($sisaPersediaans[$index], 0, ',', '.') }},- </td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>


<script>
    $(document).ready( function() {
            $('.data').DataTable( {
                scrollX:true,
                dom: 'Bfrtip',
                buttons: [ {
                    extend: 'excelHtml5',
                    customize: function( xlsx ) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
        
                        $('row c[r^="C"]', sheet).attr( 's', '2' );
                    }
                } ]
            } );
            $('.data-kode').DataTable( {
                dom: 'Bfrtip',
                buttons: [ {
                    extend: 'excelHtml5',
                    customize: function( xlsx ) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
        
                        $('row c[r^="C"]', sheet).attr( 's', '2' );
                    }
                } ]
            } );
    } );
</script>
</body>
</html>