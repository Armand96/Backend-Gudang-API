<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BarangList;

class BarangListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    //
    public function ShowAll()
    {
        $data = BarangList::all();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function ShowSingle(Request $req){
        $data = BarangList::where('nomor_barang', $req->input('nomor_barang'))->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function InsertBarang(Request $req){

        // $this->validate($req, [
        //     'foto' => 'required|image',
        // ]);

        // 'nomor_barang', 'nama_barang', 'satuan', 'kuantitas', 'harga_satuan', 'dibuat_oleh'
        $namafile = "";
        $data = new BarangList();
        $data->nomor_barang = $req->input('nomor_barang');
        $data->nama_barang = $req->input('nama_barang');
        $data->satuan = $req->input('satuan'); 
        $data->kuantitas = $req->input('kuantitas');
        $data->harga_satuan = $req->input('harga_satuan');
        $data->dibuat_oleh = $req->input('dibuat_oleh');
        
        // return ($req);

        if ($req->hasFile('foto')){
            // dd($req->file('foto'));
            $extname = '.'.$req->file('foto')->getClientOriginalExtension();
            $namafile = str_replace(' ', '_', $data->nomor_barang).'_'.str_replace(' ', '_', $data->nama_barang).'.'.$extname;
            $req->file('foto')->move(storage_path('gambar_barang'), $namafile);
            $data->foto = $namafile;
            
        }

        return $data;

        // if ($data->save())
        // {
        //     return response()->json([
        //         'success' => true
        //     ]);
        // } else {
        //     unlink(storage_path('gambar_barang').'/'.$namafile);
        // }
    }

    public function ambilFoto($namafile){
        $imgpath = storage_path('gambar_barang') . '/' . $namafile;
        if (file_exists($imgpath)) {
            $file = file_get_contents($imgpath);
            return response($file, 200)->header('Content-Type', 'image/jpeg');
          }$res['success'] = false;
          $res['message'] = "Gambar Tidak Ditemukan";
          
        return $res;
    }

    private function checks($user_profile){
        if ($user_profile) {
            $current_avatar_path = storage_path('avatar') . '/' . $user_profile->avatar;
            if (file_exists($current_avatar_path)) {
              unlink($current_avatar_path);
            }
        }
    }

    public function updateBarang(Request $req){

        // 'nomor_barang', 'nama_barang', 'satuan', 'kuantitas', 'harga_satuan', 'dibuat_oleh'
        $data = BarangList::where('nomor_barang', $req->input('nomor_barang'))->first();
        $data->nama_barang = $req->input('nama_barang');
        $data->satuan = $req->input('satuan');

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function deleteBarang(Request $req){

        $data = BarangList::where('nomor_barang', $req->input('nomor_barang'))->first();
        
        if($data->delete()){
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function TopTenBarang(){

        $data = BarangList::orderBy('kuantitas', 'DESC')->take(10)->get();
        return response()->json([
            'success' => true,
            'data'=>$data
        ]);
    }

    public function MostCreatedBarang(){

        // $data = BarangList::where('dibuat_oleh', '=', 'Armand')->count();
        //$ethnicityAndCountArray = Employee::select(DB::Raw('Ethnicity, COUNT(*) as count'))->groupBy('Ethnicity');
        $data = BarangList::select(DB::raw('COUNT(nomor_barang) AS jumlah_barang, dibuat_oleh AS pembuat'))->groupBy('pembuat')->get();
        return response()->json([
            'success' => true,
            'data'=>$data
        ]);
    }

    public function CountBarang(){

        $data = BarangList::count();
        return response()->json([
            'success' => true,
            'data'=>$data
        ]);

    }

    public function OnlyNomorBarang(){

        $data = BarangList::distinct()->orderby("nomor_barang")->get('nomor_barang');
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function OnlyNomorNamaBarang(){

        $data = BarangList::distinct()->orderby("nomor_barang")->get(['nomor_barang', 'nama_barang']);
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function perubahanKuantitas(Request $req){

        $data = BarangList::where('nomor_barang', $req->input('nomor_barang'))->first();
        $data->kuantitas += $req->input('kuantitas');
        if($data->save()){
            return response()->json([
                'success'=>true,
                'data'=>$data
            ]);
        }
        
    }

    
}


