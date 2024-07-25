<?php

namespace App\Http\Controllers;

use App\Models\kodeGL;
use Illuminate\Http\Request;

class kodeGLController extends Controller
{
    public function index(){
        return view('dashboard.tambahKodeGL');
    }

    public function tambahKodeGL(Request $request){


        kodeGL::create([
            'kode' => $request->kode,
            'kode_debit' => $request->kode_debit,
            'namaKode' => $request->namaKode,
            'kodeGabungan' => $request->namaKode.' ('.$request->kode.')',
            'kategori' => $request->kategori
        ]);

        return redirect('/pendaftaran-atk')->with('message','Kode GL Berhasil Ditambahkan!');
    }


    public function showTabelKode(){

        $dataKode = kodeGL::all();

        return view('dashboard.kode.tabelKode',
        [
        'dataKodes' => $dataKode,
        ]);
    }

    public function editKode($kodeKode){

        $dataKode = kodeGL::where('kode',$kodeKode)->first();


        return view('dashboard.kode.editKode', [
            'dataKode' => $dataKode
        ]);

        
    }

    public function kirimEditKode(Request $request){

            $validate = $request->validate([
                'kode' => 'required',
                'kode_debit' => 'required',
                'namaKode' => 'required',
                'kategori' => 'required'
            ]);

                kodeGL::where('kode',$request->kode)->update([
                    'kode' => $validate['kode'],
                    'kode_debit' => $validate['kode_debit'],
                    'namaKode' => $validate['namaKode'],
                    'kategori' => $validate['kategori']
        
                ]);

        return redirect('/tabel-kode')->with('message','Kode Telah Diedit');
        
    }

    public function hapusKode($kodeKode){


        $data = KodeGL::all()->where('kode',$kodeKode)->first();

        $data->delete();
        return redirect('/tabel-kode')->with('message-delete','Kode Telah Dihapus');

    }

}
