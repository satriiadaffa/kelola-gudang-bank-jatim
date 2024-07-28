<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>&nbsp;</title>
    <script type="text/javascript" src="{{asset('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('DataTables/js/jquery.dataTables.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/beranda.css')}}">
    <link rel="stylesheet" href="{{asset('css/formInput.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }

                /* Styles go here */
        .page-header, .page-header-space {
        height: 70px;
        }

        .page-footer, .page-footer-space {
        height: 200px;

        }

        .page-body {
            margin-top: 71px;
        }

        th, td{
            font-size: 10px !important;
        }

        .page-footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        z-index: 1;
        /* border-top: 1px solid black; for demo */
        background: rgb(255, 255, 255);
        }

        .page-header {
        position: fixed;
        top: 0mm;
        width: 100%;
        z-index: 1;
        /* border-bottom: 1px solid black; for demo */
        background: rgb(255, 255, 255);
        }

        /* @page {
        margin: 20mm
        } */

        @media print {
        thead {display: table-header-group;} 
        tfoot {display: table-footer-group;}
        
        .btn {display: none;}
        .textarea {display: none;}
        
        body {margin: 0;}
        }
    </style>

</head>
<body>
    <div class="page-header" style="text-align: center">
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col" style="">
                    <p class=" text-center mb-0" style="font-size: 20px;">Slip Jurnal</p>
                    <p class=" text-center mb-0" style="font-size: 14px;">{{$tanggal}}</p>
                </div>
                <div class="col-2"></div>
                <div class="col-2">
                    <img class="img" src="{{asset('image\logo bank jatim.png')}}" alt="" style="width:250%"> 
                </div>
            </div>
        </div>
    </div>
    <div class="page-footer">
        <div class="container">
            <div class="row mt-3">
                <div class="col-5 text-center" style="height: 200px;display:flex;justify-content: space-around;flex-direction: column">
                    <p>Menyetujui</p>
                    <p><b><u>WAWAN BUDI R.</u></b><br>Pemimpin</p>
                </div>
                <div class="col mt-3">
                    <button type="button" onClick="window.print()" class="btn btn-success mt-3">
                    Cetak
                    </button>
                    <button type="button" onClick="window.history.back()" class="btn btn-danger mt-3">
                        Kembali
                    </button>
                </div>
                <div class="col-5 text-center" style="height: 200px;display:flex;justify-content: space-around;flex-direction: column">
                    <p>Kepala Seksi</p>
                    <p><b><u>MARINI TRI S.</u></b><br>Peny. Umum dan Akuntansi</p>
                </div> 
            </div>
        </div>
    </div>
    
    <div class="page-body">
        <table>
            <thead>
                <tr>
                    <th class="text-center" style="width:400px">KETERANGAN</th>
                    <th class="text-center">KODE REKENING</th>
                    <th class="text-center">DEBET</th>
                    <th class="text-center">KREDIT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if($unit->lokasi=="cabang")
                        @foreach($kodeBarangs as $kodeBarang)
                        <p style="margin:-5px 0px;padding:0px">{{$kodeBarang['namaBarang']}}</p>
                        @endforeach
                        @elseif($unit->lokasi=="non-cabang")
                        <p style="margin:-5px 0px;padding:0px"><b>{{$unit->namaUnit}}</b></p>
                        @endif
                        <p style="margin:-5px 0px -5px 20px;padding:0px">{{$unitUmum->namaUnit}}</p>
                    </td>
                    <td class="text-center">
                        @if($unit->lokasi=="cabang")
                        @foreach($kodeBarangs as $kodeBarang)
                        <p style="margin:-5px 0px;padding:0px">{{$kodeBarang['kodeBarang']}}</p>
                        @endforeach
                        @elseif($unit->lokasi=="non-cabang")
                        <p style="margin:-5px 0px;padding:0px">{{$unit->no_rekening}}</p>
                        @endif
                        <p style="margin:-5px 0px;padding:0px">{{$unitUmum->no_rekening}}</p>
                    </td>
                    <td style="text-align: right">
                        @if($unit->lokasi=="cabang")
                        @foreach($hargaAkhirs as $hargaAkhir)
                        <p style="margin:-5px 0px;padding:0px">Rp. {{ number_format($hargaAkhir, 0, ',', '.') }},00</p>
                        @endforeach
                        @elseif($unit->lokasi=="non-cabang")
                        <p style="margin:-5px 0px;padding:0px">Rp. {{ number_format($hargaTotal, 0, ',', '.') }},00</p>
                        @endif
                        <p style="margin:-5px 0px;padding:0px">&nbsp;</p>
                    </td>
                    <td style="text-align: right">
                        @if($unit->lokasi=="cabang")
                        @foreach($hargaAkhirs as $hargaAkhir)
                        <p style="margin:-5px 0px;padding:0px">&nbsp;</p>   
                        @endforeach
                        @elseif($unit->lokasi=="non-cabang")
                        <p style="margin:-5px 0px;padding:0px">&nbsp;</p>
                        @endif
                        <p style="margin:-5px 0px;padding:0px">Rp. {{ number_format($hargaTotal, 0, ',', '.') }},00</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin:-5px 0px;padding:0px">{{$unitUmum->namaUnit}}</p>
                        @foreach($kodeBarangs as $kodeBarang)
                        <p style="margin:-5px 0px -5px 20px;padding:0px">{{$kodeBarang['namaBarang']}}</p>
                        @endforeach
                    </td>
                    <td class="text-center">
                        <p style="margin:-5px 0px;padding:0px">{{$unitUmum->no_rekening}}</p>
                        @foreach($kodeBarangs as $kodeBarang)
                        <p style="margin:-5px 0px;padding:0px">{{$kodeBarang['kodeBarang']}}</p>
                        @endforeach
                    </td>
                    <td style="text-align: right">
                        <p style="margin:-5px 0px;padding:0px">Rp. {{ number_format($hargaTotal, 0, ',', '.') }},00</p>
                        @foreach($hargaAkhirs as $hargaAkhir)
                        <p style="margin:-5px 0px;padding:0px">&nbsp;</p>   
                        @endforeach
                    </td>
                    <td style="text-align: right">
                        <p style="margin:-5px 0px;padding:0px">&nbsp;</p>
                        @foreach($hargaAkhirs as $hargaAkhir)
                        <p style="margin:-5px 0px;padding:0px">Rp. {{ number_format($hargaAkhir, 0, ',', '.') }},00</p>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="keterangan"><b><u>KETERANGAN :</u></b></label>
                        <textarea class="form-control mt-1 textarea" name="keterangan" id="keterangan" style="width:100%;height:100%;resize:none;font-size:12px"></textarea>
                        <input class="form-control mt-1 btn btn-secondary" id="submitBtn" style="font-size:12px" type="button" value="Submit">
                        <p class="keterangan"></p>
                    </td>
                    <td></td>
                    <td style="text-align: right">
                        <p style="margin:-5px 0px;padding:0px">Rp. {{ number_format($hargaTotal, 0, ',', '.') }},00</p>
                    </td>
                    <td style="text-align: right">
                        <p style="margin:-5px 0px;padding:0px">Rp. {{ number_format($hargaTotal, 0, ',', '.') }},00</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        // Menambahkan event listener untuk tombol Submit
        document.getElementById('submitBtn').addEventListener('click', function() {
            // Mengambil nilai dari textarea
            var keteranganText = document.getElementById('keterangan').value;
            // Menampilkan nilai dalam elemen <p> dengan kelas 'keterangan'
            document.querySelector('p.keterangan').innerText = keteranganText;
        });
    </script>
</body>
    



