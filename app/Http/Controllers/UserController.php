<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
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

    public function singleUser(Request $req){
        $data = User::where('userid',$req->input('userid'))->get()->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function newUser (Request $request){
        $data = new User();
        $data->nomor_pegawai = $request->input('nomor_pegawai');
        $data->username = $request->input('username');
        $data->userpassword = Hash::make($request->input('userpassword')); 
        $data->api_token = base64_encode(str_random(20));
        
        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function updateUser (Request $req){
        
        $data = User::where('userid',$req->input('userid'))->first();
        $data->nomor_pegawai = $req->input('nomor_pegawai');
        $data->username = $req->input('username');
        
        $data->save();
        
        return response()->json([
            'success' => true,
            'data'=>$data
        ]);
        
    }

    public function login(Request $req){

        $username = $req->input('username');
        $password = $req->input('userpassword');

        $user = User::where('username', $username)->first();

        if(Hash::check($password, $user->userpassword)){
            $apiToken = base64_encode(str_random(20));
            $user->api_token = $apiToken;
            $user->save();
            
            return response()->json([
                'success' => true,
                'data'=>[
                    'username'=>$user->username,
                    'api_token'=>$apiToken
                ]
            ]);
        }
    }

    public function checkLogin(Request $req){
        
        $data = User::where('api_token',$req->input('api_token'))->get(['username', 'api_token'])->first();
        $this->json['data'] = $data;
        return response()->json($this->json);
    }
}
