<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Souvenir {{$namaUnit}}</title>
    <script type="text/javascript" src="{{asset('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/xlsx.full.min.js')}}"></script>
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
          <div class="col-2 d-flex" style="flex-direction: column;">
            <form action="{{url('/slip-jurnal-souvenir/'.$kodeUnit)}}" method="POST">
                @csrf
                  <div class="d-flex">
                      <label for="start_date">Tanggal Mulai</label>
                  <input class="form-control" type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                  </div>
                  <div class="d-flex mb-3">
                      <label for="end_date">Tanggal Selesai</label>
                  <input class="form-control" type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                  </div>
          </div>
          <div class="col-2">
              <button class="btn btn-outline-primary mt-1" type="submit"> <i class="fa-solid fa-file-pdf"></i> Slip Jurnal</button>
          </form>
          <button class="btn btn-outline-success mt-1" onclick="exportTableToExcel('data', 'Laporan_Souvenir')"> <i class="fa-solid fa-file-excel"></i> Export Excel</button>

          </div>
        </div>
        <div class="row">
            <div class="col table-container">
                <table id="data" class="table table-striped table-bordered data">
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

{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('.data').DataTable();
    });
    </script> --}}

<script type="text/javascript">
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        var workbook = XLSX.utils.table_to_book(tableSelect, {sheet: "Sheet 1"});
        var wbout = XLSX.write(workbook, {bookType:'xlsx', type: 'binary'});
        
        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }
        
        var blob = new Blob([s2ab(wbout)], {type: dataType});
        
        downloadLink = document.createElement("a");
        downloadLink.href = URL.createObjectURL(blob);
        downloadLink.download = filename ? filename + '.xlsx' : 'excel_data.xlsx';
        
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    }
    
    $(document).ready(function(){
        $('.data').DataTable();
    });
</script>
    
</html>



