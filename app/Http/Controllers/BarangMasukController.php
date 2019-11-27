<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BarangMasuk;

class BarangMasukController extends Controller
{

    private $selfield = [
        'barang_masuk.nomor_barang', 'barang_list.nama_barang',
        'asal_barang', 'no_kontrak', 'tgl_masuk', 'jml_msk_angka',
        'jml_msk_huruf', 'keterangan', 'no_bapm'
    ];
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
    public function ShowAll()
    {
        $data = BarangMasuk::orderBy('tgl_masuk', 'DESC')->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function ShowSingle($id)
    {
        array_push($this->selfield, 'barang_list.satuan', 'id');
        $data = BarangMasuk::where('id', $id)->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_masuk.nomor_barang')
            ->select($this->selfield)->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function InsertBarangMasuk(Request $req)
    {

        // 'asal_barang', 'no_kontrak', 'tgl_masuk', 'nomor_barang', 
        // 'jml_msk_angka', 'jml_msk_huruf', 'keterangan'
        $data = new BarangMasuk();
        $data->no_bapm = $req->input('no_bapm');
        $data->asal_barang = $req->input('asal_barang');
        $data->no_kontrak = $req->input('no_kontrak');
        // $data->tgl_masuk = $req->input('tgl_masuk'); 
        $data->nomor_barang = $req->input('nomor_barang');
        $data->jml_msk_angka = $req->input('jml_msk_angka');
        $data->jml_msk_huruf = $req->input('jml_msk_huruf');
        $data->keterangan = $req->input('keterangan');

        if ($data->save()) {
            return response()->json([
                'success' => true
            ]);
        }
    }

    // BUAT INSERT DATA BARANG MASUK SEKALIGUS
    public function insertBarangMasukRepeat(Request $req)
    {
        $success = false;

        foreach ($req->input('array_barang') as $val) {
            $data = new BarangMasuk();
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

    // BUAT EDIT BARANG MASUK
    public function updateBarangMasuk(Request $req)
    {
        $data = BarangMasuk::where('id', $req->input('id'))->first();
        $data->no_bapm = $req->input('no_bapm');
        $data->asal_barang = $req->input('asal_barang');
        $data->no_kontrak = $req->input('no_kontrak');
        $data->tgl_masuk = $req->input('tgl_masuk');
        $data->nomor_barang = $req->input('nomor_barang');
        $data->jml_msk_angka = $req->input('jml_msk_angka');
        $data->jml_msk_huruf = $req->input('jml_msk_huruf');
        $data->keterangan = $req->input('keterangan');

        if ($data->save()) {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function deleteBarangMasuk($id)
    {

        $data = BarangMasuk::where('id', $id)->first();

        if ($data->delete()) {
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function selectBasedNomorBarang(Request $req)
    {
        unset($this->selfield[0]);
        array_push($this->selfield, 'id');
        $data = BarangMasuk::where('barang_masuk.nomor_barang', '=', $req->input('nomor_barang'))
            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_masuk.nomor_barang')
            ->select($this->selfield)->get();
        $json['nomor_barang'] = $req->input('nomor_barang');
        $json['nama_barang'] = $data[0]->nama_barang;
        foreach ($data as $key => $value) {
            unset($data[$key]->nama_barang);
        }
        $json['arraydata'] = $data;

        return response()->json([
            'success' => true,
            'data' => $json
        ]);
    }

    public function selectBasedAsal(Request $req)
    {
        // unset($this->selfield[2]);
        array_push($this->selfield, 'barang_list.satuan', 'id');
        $data = BarangMasuk::where('asal_barang', '=', $req->input('asal_barang'))
            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_masuk.nomor_barang')
            ->select($this->selfield)->get();
        // $json['asal'] = $req->input('asal_barang');
        $json['arraydata'] = $data;

        return response()->json([
            'success' => true,
            'data' => $json
        ]);
    }

    public function selectBasedNoKontrak(Request $req)
    {
        // unset($this->selfield[3]);
        array_push($this->selfield, 'barang_list.satuan', 'id');
        $data = BarangMasuk::where('no_kontrak', '=', $req->input('no_kontrak'))
            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_masuk.nomor_barang')
            ->select($this->selfield)->get();
        // $json['no_kontrak'] = $req->input('no_kontrak');
        $json['arraydata'] = $data;

        return response()->json([
            'success' => true,
            'data' => $json
        ]);
    }

    public function selectBasedNoBAPM(Request $req)
    {
        // unset($this->selfield[3]);
        array_push($this->selfield, 'barang_list.satuan', 'id');
        $data = BarangMasuk::where('no_bapm', '=', $req->input('no_bapm'))
            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_masuk.nomor_barang')
            ->select($this->selfield)->get();
        // $json['no_kontrak'] = $req->input('no_kontrak');
        $json['arraydata'] = $data;

        return response()->json([
            'success' => true,
            'data' => $json
        ]);
    }

    public function CountBarangMasuk()
    {
        $data = BarangMasuk::count();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // ================================== DISTINCT

    public function DistinctShow()
    {

        $data = BarangMasuk::distinct()->get(['no_bapm', 'asal_barang', 'no_kontrak', 'keterangan']);
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function DistinctBAPM()
    {

        $data = BarangMasuk::distinct()
            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_masuk.nomor_barang')
            ->get('no_bapm');
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function DistinctBarang()
    {

        $data = BarangMasuk::distinct()
            ->leftJoin('barang_list', 'barang_list.nomor_barang', '=', 'barang_masuk.nomor_barang')
            ->get(['barang_list.nomor_barang', 'barang_list.nama_barang']);
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function DistinctAsal()
    {

        $data = BarangMasuk::distinct()->get('asal_barang');
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function DistinctKontrak()
    {

        $data = BarangMasuk::distinct()->get('no_kontrak');
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
