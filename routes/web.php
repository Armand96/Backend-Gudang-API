<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


// $router->get('/', function () use ($router) {
//     return "<h1 style='text-align:center'> FUCK OFF!!!! </h1>";
// });

$router->group(['prefix'=>'api'], function() use($router){

    $router->post('/login', 'UserController@Login');

    $router->post('/checklogin', 'UserController@checkLogin');

    $router->get('/nomornamabarangonly', 'BarangListController@OnlyNomorNamaBarang');
    
    // ============================ ga danta ============================
    // $router->get('/key', 'UserController@generateKey');
    
    // $router->post('/tespost', function () {
    //     return 'abcd';
    // });
    // ============================ ga danta ============================
    
    $router->group(['middleware'=>'auth'], function() use($router){

        // ================================= Bengkel =================================

        $router->get('/bengkelall', 'BengkelController@index');
        $router->post('/bengkelinsert', 'BengkelController@newBengkel');
        $router->post('/bengkelupdate', 'BengkelController@updateBengkel');
        $router->get('/bengkeldelete/{id}', 'BengkelController@deleteBengkel');
        $router->get('/bengkelread/{id}', 'BengkelController@singleBengkel');

        // ================================= Bengkel =================================

        // ================================= NO ORDER =================================

        // $router->get('/noorderall', 'NoOrderController@ShowAll');

        // $router->post('/noordersingle', 'NoOrderController@ShowSingle');

        // $router->post('/noordercreate', 'NoOrderController@newNoOrder');

        // $router->post('/noorderupdate', 'NoOrderController@UpdateOrder');

        // $router->post('/noorderdelete', 'NoOrderController@deleteNoOrder');
        
        // ================================= NO ORDER =================================

        // ================================= KODE PEKERJAAN =================================

        $router->get('/kodepekerjaanall', 'KodePekerjaanController@ShowAll');

        $router->post('/kodepekerjaansingle', 'KodePekerjaanController@ShowSingle');

        $router->post('/kodepekerjaancreate', 'KodePekerjaanController@Create');

        $router->post('/kodepekerjaanupdate', 'KodePekerjaanController@Update');

        $router->post('/kodepekerjaanrdelete', 'KodePekerjaanController@deleteKodePekerjaan');
        
        // ================================= KODE PEKERJAAN =================================


        // ================================= LIST BARANG =================================

        $router->get('/barangshowall', 'BarangListController@ShowAll'); // Tampilkan Semua Barang

        $router->post('/barangsingle', 'BarangListController@ShowSingle'); // Tampilkan Satu Barang

        $router->post('/baranginsert', 'BarangListController@InsertBarang'); // Masukkan Barang Baru

        $router->post('/barangupdate', 'BarangListController@updateBarang'); // Update Barang

        $router->post('/barangupdateq', 'BarangListController@perubahanKuantitas'); // Update Kuantitas

        $router->get('/barangfoto/{namafile}', 'BarangListController@ambilFoto'); // Ambil Foto Barang

        // ================================= LIST BARANG =================================


        // ============================== BARANG KELUAR ==============================
        
        $router->get('/barangkeluardis', 'BarangKeluarController@DistinctShow'); // Tampilkan Semua Barang Keluar

        $router->get('/barangkeluarshowall', 'BarangKeluarController@ShowAll'); // Tampilkan Semua Barang Keluar

        $router->get('/barangkeluarsingle/{id}', 'BarangKeluarController@ShowSingle'); // Tampilkan Satu Barang Keluar

        $router->post('/barangkeluarinsert', 'BarangKeluarController@InsertBarangKeluar'); // Masukkan Barang Keluar Baru

        $router->post('/barangkeluarupdate', 'BarangKeluarController@updateBarangKeluar'); // Update Barang Keluar

        $router->get('/barangkeluardelete/{id}', 'BarangKeluarController@deleteBarangKeluar'); // Delete Barang Keluar

        // ============================== BARANG KELUAR ==============================


        // ============================== BARANG MASUK ==============================
        
        $router->get('/barangmasukdis', 'BarangMasukController@DistinctShow'); // Tampilkan Semua Barang Keluar

        $router->get('/barangmasukshowall', 'BarangMasukController@ShowAll'); // Tampilkan Semua Barang Keluar

        $router->get('/barangmasuksingle/{id}', 'BarangMasukController@ShowSingle'); // Tampilkan Satu Barang Keluar

        $router->post('/barangmasukinsert', 'BarangMasukController@InsertBarangMasuk'); // Masukkan Barang Keluar Baru

        $router->post('/barangmasukinsertrepeat', 'BarangMasukController@insertBarangMasukRepeat'); // Masukkan Barang Keluar Baru

        $router->post('/barangmasukupdate', 'BarangMasukController@updateBarangMasuk'); // Update Barang Keluar

        $router->get('/barangmasukdelete/{id}', 'BarangMasukController@deleteBarangMasuk'); // Delete Barang Masuk

        // ============================== BARANG MASUK ==============================


        // ================================ AUDIT ================================

        $router->get('/auditshowall', 'AuditsController@ShowAll'); // Tampilkan Semua Audit

        $router->get('/auditsingle/{id}', 'AuditsController@ShowSingle'); // Tampilkan Satu Audit

        $router->post('/auditinsert', 'AuditsController@InsertAudit'); // Masukkan Audit Baru

        // ================================ AUDIT ================================

        // ================================ PENGADAAN ================================

        $router->get('/pengadaanshowall', 'PengadaanController@ShowAll'); // Tampilkan Semua Pengadaan

        $router->get('/pengadaansingle/{id}', 'PengadaanController@ShowSingle'); // Tampilkan Satu Pengadaan

        $router->post('/pengadaaninsert', 'PengadaanController@InsertPengadaan'); // Masukkan Pengadaan Baru

        $router->post('/pengadaanupdate', 'PengadaanController@UpdatePengadaan'); // Update Pengadaan

        $router->get('/pengadaandelete/{id}', 'PengadaanController@deleteSPP'); // Delete Barang Masuk

        // ================================ PENGADAAN ================================


        ###################################### ADVANCED QUERY ######################################

        #================================ BARANG LIST ================================

        $router->get('/toptenbarang', 'BarangListController@TopTenBarang');
        $router->get('/mostbarang', 'BarangListController@MostCreatedBarang');
        $router->get('/nomorbarangonly', 'BarangListController@OnlyNomorBarang');

        #================================ BARANG LIST ================================

        #================================ BARANG KELUAR ================================

        // ========== SELECT BASED
        $router->post('/nospm', 'BarangKeluarController@selectBasedNoSPM');
        $router->post('/proyek', 'BarangKeluarController@selectBasedProject');
        $router->post('/bengkel', 'BarangKeluarController@selectBasedBengkel');
        $router->post('/noorders', 'BarangKeluarController@selectBasedNoOrder');        
        $router->post('/pekerjaan', 'BarangKeluarController@selectBasedPekerjaan');
        $router->post('/nomorbarangkeluar', 'BarangKeluarController@selectBasedNomorBarang');

        // ===================== DISTINCT
        $router->get('/nmrdisbarangkeluar', 'BarangKeluarController@DistinctBarang');
        $router->get('/proyekdis', 'BarangKeluarController@DistinctProyek');
        $router->get('/bengkeldis', 'BarangKeluarController@DistinctBengkel');
        $router->get('/nospmdis', 'BarangKeluarController@DistinctNoSPM');

        #================================ END OF BARANG KELUAR ================================

        #================================ BARANG MASUK ================================

        $router->post('/nobapm', 'BarangMasukController@selectBasedNoBAPM');
        $router->post('/nomorbarangmasuk', 'BarangMasukController@selectBasedNomorBarang');
        $router->post('/asalbarang', 'BarangMasukController@selectBasedAsal');
        $router->post('/nokontrak', 'BarangMasukController@selectBasedNoKontrak');
        
        // ======================== DISTINCT
        $router->get('/nmrdisbarangmasuk', 'BarangMasukController@DistinctBarang');
        $router->get('/nokontrakdis', 'BarangMasukController@DistinctKontrak');
        $router->get('/asalbarangdis', 'BarangMasukController@DistinctAsal');
        $router->get('/nobapmdis', 'BarangMasukController@DistinctBAPM');

        #================================ END OF BARANG MASUK ================================

        #================================ PENGADAAN ================================
        $router->post('/nospp', 'PengadaanController@SelectBasedSPP'); // Pilih Berdasarkan SPP
        $router->get('/nosppdis', 'PengadaanController@DistinctNoSPP'); // Pilih Berdasarkan SPP Unique
        #================================ END OF PENGADAAN ================================

        #### =============================== GENERAL ============================= ####
        $router->get('/countbarangmasuk', 'BarangMasukController@CountBarangMasuk');

        $router->get('/countbarangkeluar', 'BarangKeluarController@CountBarangKeluar');

        $router->get('/countbarang', 'BarangListController@CountBarang');
        
        #### =============================== GENERAL =============================== ####

        ###################################### ADVANCED QUERY ######################################
    });


    // ================================= USER =================================
    $router->get('/userall', 'UserController@index'); //Tampilkan Semua User
    
    $router->post('/usersingle', 'UserController@singleUser'); //Tampilkan Satu User
    
    $router->post('/userinsert', 'UserController@newUser'); //Masukkan User Baru
    
    $router->post('/userupdate', 'UserController@updateUser'); //Update User
    
    // ================================= USER =================================

    
});

$router->get('/{any:.*}', function($any){
    return "<h1 style='text-align:center'> FUCK OFF!!!! </h1>";
    // return redirect('http://www.kontol.com');
    // return date('Y-m-d H:i:s');
    // header("location : ". $_SERVER['HTTP_HOST']);
    // echo "test";
    // exit;
 });