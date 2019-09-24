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

    public function ShowSingle(Request $req){
        $data = NoOrder::where('no_order', $req->input('no_order'))->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function newNoOrder(Request $request){
        $data = new NoOrder();
        $data->no_order = $request->input('no_order');
        $data->bengkel = $request->input('bengkel');
        
        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function UpdateOrder(Request $req){

        $data = NoOrder::where('no_order',$req->input('no_order_old'))->first();
        $data->no_order = $req->input('no_order');
        $data->bengkel = $req->input('bengkel');
        
        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

}


