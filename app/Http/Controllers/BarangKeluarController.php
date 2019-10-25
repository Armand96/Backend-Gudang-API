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

    private $selfield = ['id','barang_keluar.nomor_barang', 'barang_list.nama_barang',
                        'proyek', 'barang_keluar.no_order', 'barang_keluar.kode_pekerjaan',
                        'tgl_keluar', 'jml_klr_permintaan_angka', 'jml_klr_angka', 'kode_pekerjaan.pekerjaan',
                        'no_order.bengkel', 'no_spm'];
    //
    public function ShowAll(){

        // unset($this->selfield[7]);
        // unset($this->selfield[8]);

        $data = BarangKeluar::all();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function ShowSingle($id){
        unset($this->selfield[9]);
        unset($this->selfield[10]);
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
        $data->no_spm = $req->input('no_spm');
        $data->proyek = $req->input('proyek');
        $data->no_order = $req->input('no_order');
        // $data->bengkel = $req->input('bengkel'); 
        // $data->pekerjaan = $req->input('pekerjaan');
        $data->kode_pekerjaan = $req->input('kode_pekerjaan');
        $data->tgl_keluar = $req->input('tgl_keluar');
        $data->nomor_barang = $req->input('nomor_barang');
        $data->jml_klr_angka = $req->input('jml_klr_angka');
        $data->jml_klr_huruf = $req->input('jml_klr_huruf');
        $data->jml_klr_permintaan_angka = $req->input('jml_klr_permintaan_angka');
        $data->jml_klr_permintaan_huruf = $req->input('jml_klr_permintaan_huruf');

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
        $data->no_spm = $req->input('no_spm');
        $data->proyek = $req->input('proyek');
        $data->no_order = $req->input('no_order');
        $data->no_order = $req->input('kode_pekerjaan');
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

        $data = BarangKeluar::where('id', $id->input('id'))->first();
        
        if($data->delete()){
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function selectBasedNoSPM(Request $req){

        array_push($this->selfield, 'jml_klr_huruf', 'barang_list.satuan', 'jml_klr_permintaan_huruf');
        $data = BarangKeluar::where('no_spm', '=', $req->input('no_spm'))
                            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                            ->leftJoin('kode_pekerjaan', 'kode_pekerjaan.kode_pekerjaan', '=', 'barang_keluar.kode_pekerjaan')
                            ->leftJoin('no_order', 'no_order.no_order', '=', 'barang_keluar.no_order')
                            ->select($this->selfield)->get();

        // $json['proyek'] = $req->input('proyek');
        $json['arraydata'] = $data;

        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);
    }

    public function selectBasedProject(Request $req){

        array_push($this->selfield, 'jml_klr_huruf', 'barang_list.satuan', 'jml_klr_permintaan_huruf');
        $data = BarangKeluar::where('proyek', '=', $req->input('proyek'))
                            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                            ->leftJoin('kode_pekerjaan', 'kode_pekerjaan.kode_pekerjaan', '=', 'barang_keluar.kode_pekerjaan')
                            ->leftJoin('no_order', 'no_order.no_order', '=', 'barang_keluar.no_order')
                            ->select($this->selfield)->get();

        $json['proyek'] = $req->input('proyek');
        $json['arraydata'] = $data;

        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);
    }

    public function selectBasedBengkel(Request $req){

        array_push($this->selfield, 'jml_klr_huruf', 'barang_list.satuan', 'jml_klr_permintaan_huruf', 'pekerjaan', 'bengkel');
        $data = BarangKeluar::where('bengkel', '=', $req->input('bengkel'))
                            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                            ->leftJoin('kode_pekerjaan', 'kode_pekerjaan.kode_pekerjaan', '=', 'barang_keluar.kode_pekerjaan')
                            ->leftJoin('no_order', 'no_order.no_order', '=', 'barang_keluar.no_order')
                            ->select($this->selfield)->get();
        // $json['bengkel'] = $req->input('bengkel');
        $json['arraydata'] = $data;

        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);

    }

    public function selectBasedNoOrder(Request $req){

        array_push($this->selfield, 'jml_klr_huruf', 'barang_list.satuan', 'jml_klr_permintaan_huruf', 'pekerjaan', 'bengkel');
        $data = BarangKeluar::where('barang_keluar.no_order', '=', $req->input('no_order'))
                            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                            ->leftJoin('kode_pekerjaan', 'kode_pekerjaan.kode_pekerjaan', '=', 'barang_keluar.kode_pekerjaan')
                            ->leftJoin('no_order', 'no_order.no_order', '=', 'barang_keluar.no_order')
                            ->select($this->selfield)->get();
        // $json['bengkel'] = $req->input('bengkel');
        $json['arraydata'] = $data;

        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);

    }

    public function selectBasedKodePekerjaan(Request $req){
        // unset($this->selfield[4]);
        $data = BarangKeluar::where('barang_keluar.kode_pekerjaan', '=', $req->input('kode_pekerjaan'))
                                ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                                ->leftJoin('kode_pekerjaan', 'kode_pekerjaan.kode_pekerjaan', '=', 'barang_keluar.kode_pekerjaan')
                                ->select($this->selfield)->get();

        // $json['pekerjaan'] = $req->input('pekerjaan');
        $json['arraydata'] = $data;

        return response()->json([
            'success'=>true,
            'data'=>$json
        ]);

    }

    // BUAT INSERT DATA BARANG MASUK SEKALIGUS
    public function insertBarangKeluarRepeat(Request $req)
    {
        $success = false;

        foreach ($req->input('array_barang') as $val) {
            $data = new BarangKeluar();
            $data->no_bapm = $req->input('no_bapm');
            $data->asal_barang = $req->input('asal_barang');
            $data->no_kontrak = $req->input('no_kontrak');
            $data->keterangan = $req->input('keterangan');
            $data->nomor_barang = $val['nomor_barang'];
            $data->jml_msk_angka = $val['jml_msk_angka'];
            $data->jml_msk_huruf = $val['jml_msk_huruf'];
            $success = $data->save();
            if (!$success) {
                return response()->json([
                    'success' => $success
                ]);
            }
        }

        return response()->json([
            'success' => $success
        ]);
    }

    public function selectBasedNomorBarang(Request $req){
        
        array_push($this->selfield, 'jml_klr_huruf');
        $data = BarangKeluar::where('barang_keluar.nomor_barang', '=', $req->input('nomor_barang'))
                                ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
                                ->leftJoin('kode_pekerjaan', 'kode_pekerjaan.kode_pekerjaan', '=', 'barang_keluar.kode_pekerjaan')
                                ->leftJoin('no_order', 'no_order.no_order', '=', 'barang_keluar.no_order')
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

    // ===================================== DISTINCT

    public function DistinctShow(){
        
        $data = BarangKeluar::distinct()->get(['no_spm','proyek', 'no_order', 'kode_pekerjaan']);
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function DistinctBarang(){
        
        $data = BarangKeluar::distinct()->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_keluar.nomor_barang')
        ->get(['barang_list.nomor_barang', 'barang_list.nama_barang']);
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function DistinctNoSPM(){
        
        $data = BarangKeluar::distinct()->get('no_spm');
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function DistinctBengkel(){
        
        $data = BarangKeluar::distinct()->get('bengkel');
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

    public function DistinctProyek(){
        
        $data = BarangKeluar::distinct()->get('proyek');
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }

}


