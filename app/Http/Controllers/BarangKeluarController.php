<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BarangKeluar;

class BarangKeluarController extends Controller
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

    private $selfield = ['barang_keluar.nomor_barang', 'barang_list.nama_barang', 
                        'proyek', 'no_order', 'pekerjaan', 'kode_pekerjaan',
                        'tgl_keluar', 'jml_klr_permintaan_angka', 'jml_klr_angka', 'satuan'];
    //
    public function ShowAll(){

        unset($this->selfield[7]);
        unset($this->selfield[8]);
        unset($this->selfield[9]);

        $data = BarangKeluar::select($this->selfield)
                ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                ->get();
        return response()->json([
            'succes' => true,
            'data' => $data
        ]);
    }

    public function ShowSingle($id){

        array_push($this->selfield, 'jml_klr_permintaan_huruf', 'jml_klr_huruf');
        $data = BarangKeluar::where('id', $id)
                ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                ->select($this->selfield)->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function InsertBarangKeluar(Request $req){

        // 'proyek', 'no_order', 'bengkel', 'pekerjaan', 'tgl_keluar', 
        // 'nomor_barang', 'jml_klr_angka', 'jml_klr_huruf',
        $data = new BarangKeluar();
        $data->proyek = $req->input('proyek');
        $data->no_order = $req->input('no_order');
        $data->bengkel = $req->input('bengkel'); 
        $data->pekerjaan = $req->input('pekerjaan');
        $data->tgl_keluar = $req->input('tgl_keluar');
        $data->nomor_barang = $req->input('nomor_barang');
        $data->jml_klr_angka = $req->input('jml_klr_angka');
        $data->jml_klr_huruf = $req->input('jml_klr_huruf');

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function updateBarangKeluar(Request $req){

        // 'nomor_barang', 'nama_barang', 'satuan', 'kuantitas', 'harga_satuan', 'dibuat_oleh'
        $data = BarangKeluar::where('id', $req->input('id'))->first();
        $data->proyek = $req->input('proyek');
        $data->no_order = $req->input('no_order');
        $data->bengkel = $req->input('bengkel'); 
        $data->pekerjaan = $req->input('pekerjaan');
        $data->tgl_keluar = $req->input('tgl_keluar');
        $data->nomor_barang = $req->input('nomor_barang');
        $data->jml_klr_angka = $req->input('jml_klr_angka');
        $data->jml_klr_huruf = $req->input('jml_klr_huruf');

        if ($data->save())
        {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function deleteBarangKeluar($id){

        $data = BarangKeluar::where('id', $req->input('id'))->first();
        
        if($data->delete()){
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function selectBasedProject(Request $req){

        $data = BarangKeluar::where('proyek', '=', $req->input('proyek'))
                            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                            ->select($this->selfield)->get();

        $json['proyek'] = $req->input('proyek');
        $json['arraydata'] = $data;

        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);
    }

    public function selectBasedBengkel(Request $req){

        $data = BarangKeluar::where('bengkel', '=', $req->input('bengkel'))
                            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                            ->select($this->selfield)->get();
        $json['bengkel'] = $req->input('bengkel');
        $json['arraydata'] = $data;

        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);

    }

    public function selectBasedPekerjaan(Request $req){
        unset($this->selfield[4]);
        $data = BarangKeluar::where('pekerjaan', '=', $req->input('pekerjaan'))
                                ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                                ->select($this->selfield)->get();

        $json['pekerjaan'] = $req->input('pekerjaan');
        $json['arraydata'] = $data;

        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);

    }

    public function selectBasedNomorBarang(Request $req){
        unset($this->selfield[0]);
        $data = BarangKeluar::where('barang_keluar.nomor_barang', '=', $req->input('nomor_barang'))
                                ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
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

    public function CountBarangKeluar(){

        $data = BarangKeluar::count();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);

    }

}


