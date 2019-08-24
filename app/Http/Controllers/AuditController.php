<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Audits;

class AuditsController extends Controller
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

    //
    public function ShowAll(){
        $data = Audits::all();
        return response()->json([
            'succes' => true,
            'data' => $data
        ]);
    }

    public function ShowSingle($id){
        $data = Audits::where('id', $id)->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function InsertAudit(Request $req){

        // 'userid','tipe_audit', 'nomor_barang', 'barang_keluar_id', 
        // 'barang_masuk_id', 'nilai_lama', 'nilai_baru',
        $data = new Audits();
        $data->userid = $req->input('userid');
        $data->tipe_audit = $req->input('tipe_audit');
        $data->nomor_barang = $req->input('nomor_barang'); 
        $data->barang_keluar_id = $req->input('barang_keluar_id');
        $data->barang_masuk_id = $req->input('barang_masuk_id');
        $data->nilai_lama = $req->input('nilai_lama');
        $data->nilai_baru = $req->input('nilai_baru');

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

}


