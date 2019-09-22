<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\NoOrder;

class NoOrderController extends Controller
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
        $data = NoOrder::all();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function ShowSingle($id){
        $data = NoOrder::where('no_order', $id)->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    // public function InsertOrder(Request $req){

    //     $data = new NoOrder();
    //     $data->no_order = $req->input('no_order');
    //     $data->bengkel = $req->input('bengkel');
        
    //     if ($data->save())
    //     {
    //         return response()->json([
    //             'success' => true
    //         ]);
    //     }
    // }

}


