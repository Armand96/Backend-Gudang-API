<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\KodePekerjaan;

class KodePekerjaanController extends Controller
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
        $data = KodePekerjaan::all();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function ShowSingle(Request $req){
        $data = KodePekerjaan::where('kode_pekerjaan', $req->input('kode_pekerjaan'))->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function Update(Request $req){

        $data = KodePekerjaan::where('kode_pekerjaan',$req->input('kode_pekerjaan_old'))->first();
        $data->kode_pekerjaan = $req->input('kode_pekerjaan');
        $data->pekerjaan = $req->input('pekerjaan');

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function Create(Request $req){

        $data = new KodePekerjaan();
        $data->kode_pekerjaan = $req->input('kode_pekerjaan');
        $data->pekerjaan = $req->input('pekerjaan');

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function deleteKodePekerjaan(Request $req){

        $data = KodePekerjaan::where('kode_pekerjaan', $req->input('kode_pekerjaan'))->first();
        if($data->delete()){
            return response()->json([
                'success' => true
            ]);
        }
    }


}


