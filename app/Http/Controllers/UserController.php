<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
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

    public function generateKey()
    {
        return str_random(32);
    }

    public function getUser(Request $req)
    {
        return $req->basePath();
    }
    //

    public function index(){
        $data = User::all();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function singleUser($id){
        $data = User::where('userid',$id)->get()->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function newUser (Request $request){
        $data = new User();
        $data->nomor_pegawai = $request->input('nomor_pegawai');
        $data->username = $request->input('username');
        $data->userpassword = app('hash')->make($request->input('userpassword')); 
        $data->api_token = str_random(30);

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function updateUser (Request $req){
        
        $data = User::where('userid', $req->input('userid'))->first();
        $data->nomor_pegawai = $req->input('nomor_pegawai');
        $data->username = $req->input('username');
        
        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }
}
