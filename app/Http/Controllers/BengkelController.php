<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Bengkel;

class BengkelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $json = [
        'success'=>true,
        'data'=>''
    ];

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){
        $data = Bengkel::all();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function singleBengkel($id){
        $data = Bengkel::where('id',$id)->get()->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function newBengkel (Request $request){
        $data = new Bengkel();
        $data->nama_bengkel = $request->input('nama_bengkel');
        
        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function updateBengkel (Request $req){
        
        $data = Bengkel::where('id',$req->input('id'))->first();
        $data->nama_bengkel = $req->input('nama_bengkel');
        $data->save();
        
        return response()->json([
            'success' => true
        ]);
    }

    public function deleteBengkel ($id){

        $data = Bengkel::where('id', $id)->first();
        if($data->delete()){
            return response()->json([
                'success' => true
            ]);
        }
    }
}
