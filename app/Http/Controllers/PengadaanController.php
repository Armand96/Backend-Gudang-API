<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pengadaan;

class PengadaanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('cors');
    }

    public function ShowAll(){
        $data = Pengadaan::all();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function ShowSingle($id){
        $data = Pengadaan::where('id', $id)->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function deleteSPP($id){

        $data = Pengadaan::where('id', $id)->first();
        
        if($data->delete()){
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function InsertPengadaan(Request $req){

        // 'userid','tipe_audit', 'nomor_barang', 'barang_keluar_id', 
        // 'barang_masuk_id', 'nilai_lama', 'nilai_baru',
        $data = new Pengadaan();
        $data->no_spp = $req->input('no_spp');
        $data->proyek = $req->input('proyek');
        $data->no_order = $req->input('no_order');
        // $data->tgl_pengadaan = $req->input('tgl_pengadaan');
        $data->tgl_penerimaan = $req->input('tgl_penerimaan');
        $data->nama_barang = $req->input('nama_barang');
        $data->jml_diminta = $req->input('jml_diminta');
        $data->satuan = $req->input('satuan');
        $data->keterangan = $req->input('keterangan');

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function UpdatePengadaan(Request $req){

        $data = Pengadaan::where('id', $req->input('id'))->first();
        $data->nama_barang = $req->input('nama_barang');
        $data->jml_diminta = $req->input('jml_diminta');
        $data->satuan = $req->input('satuan');
        $data->keterangan = $req->input('keterangan');

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function SelectBasedSPP(Request $req){
        $data = Pengadaan::where('no_spp', '=', $req->input('no_spp'))->get();
        $json['arraydata'] = $data;
        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);
    }

    public function DistinctNoSPP(){
        
        $data = Pengadaan::distinct()->get('no_spp');
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

}


