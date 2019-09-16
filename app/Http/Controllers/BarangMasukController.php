<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BarangMasuk;

class BarangMasukController extends Controller
{

    private $selfield = ['barang_masuk.nomor_barang', 'barang_list.nama_barang', 
                        'asal_barang', 'no_kontrak', 'tgl_masuk', 'jml_msk_angka',
                        'jml_msk_huruf', 'keterangan'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('cors');
    }

    //
    public function ShowAll()
    {
        $data = BarangMasuk::all();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function ShowSingle($id){
        $data = BarangMasuk::where('id', $id)->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function InsertBarangMasuk(Request $req){

        // 'asal_barang', 'no_kontrak', 'tgl_masuk', 'nomor_barang', 
        // 'jml_msk_angka', 'jml_msk_huruf', 'keterangan'
        $data = new BarangMasuk();
        $data->asal_barang = $req->input('asal_barang');
        $data->no_kontrak = $req->input('no_kontrak');
        // $data->tgl_masuk = $req->input('tgl_masuk'); 
        $data->nomor_barang = $req->input('nomor_barang');
        $data->jml_msk_angka = $req->input('jml_msk_angka');
        $data->jml_msk_huruf = $req->input('jml_msk_huruf');
        $data->keterangan = $req->input('keterangan');

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function updateBarangMasuk(Request $req){

        // 
        $data = BarangMasuk::where('id', $req->input('id'))->first();
        $data->asal_barang = $req->input('asal_barang');
        $data->no_kontrak = $req->input('no_kontrak');
        $data->tgl_masuk = $req->input('tgl_masuk'); 
        $data->nomor_barang = $req->input('nomor_barang');
        $data->jml_msk_angka = $req->input('jml_msk_angka');
        $data->jml_msk_huruf = $req->input('jml_msk_huruf');
        $data->keterangan = $req->input('keterangan');

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function deleteBarangMasuk($id){

        $data = BarangMasuk::where('id', $req->input('id'))->first();
        
        if($data->delete()){
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function selectBasedNomorBarang(Request $req){
        unset($this->selfield[0]);
        $data = BarangMasuk::where('barang_masuk.nomor_barang', '=', $req->input('nomor_barang'))
                                ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_masuk.nomor_barang')
                                ->select($this->selfield)->get();
        $json['nomor_barang'] = $req->input('nomor_barang');
        $json['nama_barang'] = $data[0]->nama_barang;
        foreach($data as $key=>$value){
            unset($data[$key]->nama_barang);
        }
        $json['arraydata'] = $data;
        
        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);
    }

    public function selectBasedAsal(Request $req){
        unset($this->selfield[2]);
        array_push($this->selfield, 'barang_list.satuan', 'id');
        $data = BarangMasuk::where('asal_barang', '=', $req->input('asal_barang'))
                            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_masuk.nomor_barang')
                            ->select($this->selfield)->get();
        $json['asal'] = $req->input('asal_barang');
        $json['arraydata'] = $data;

        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);

    }

    public function selectBasedNoKontrak(Request $req){
        unset($this->selfield[3]);
        $data = BarangMasuk::where('no_kontrak', '=', $req->input('no_kontrak'))
                            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_masuk.nomor_barang')
                            ->select($this->selfield)->get();
        $json['no_kontrak'] = $req->input('no_kontrak');
        $json['arraydata'] = $data;

        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);

    }

    public function CountBarangMasuk(){

        $data = BarangMasuk::count();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function DistinctBarang(){
        
        $data = BarangMasuk::distinct()->get('nomor_barang');
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function DistinctAsal(){
        
        $data = BarangMasuk::distinct()->get('asal_barang');
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }
    
    
}


