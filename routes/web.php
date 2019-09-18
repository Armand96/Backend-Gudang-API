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

        // ================================= LIST BARANG =================================

        $router->get('/barangshowall', 'BarangListController@ShowAll'); // Tampilkan Semua Barang

        $router->post('/barangsingle', 'BarangListController@ShowSingle'); // Tampilkan Satu Barang

        $router->post('/baranginsert', 'BarangListController@InsertBarang'); // Masukkan Barang Baru

        $router->post('/barangupdate', 'BarangListController@updateBarang'); // Update Barang

        $router->post('/barangupdateq', 'BarangListController@perubahanKuantitas'); // Update Kuantitas

        // ================================= LIST BARANG =================================


        // ============================== BARANG KELUAR ==============================
        
        $router->get('/barangkeluarshowall', 'BarangKeluarController@ShowAll'); // Tampilkan Semua Barang Keluar

        $router->get('/barangkeluarsingle/{id}', 'BarangKeluarController@ShowSingle'); // Tampilkan Satu Barang Keluar

        $router->post('/barangkeluarinsert', 'BarangKeluarController@InsertBarangKeluar'); // Masukkan Barang Keluar Baru

        $router->post('/barangkeluarupdate', 'BarangKeluarController@updateBarangKeluar'); // Update Barang Keluar

        // ============================== BARANG KELUAR ==============================


        // ============================== BARANG MASUK ==============================
        
        $router->get('/barangmasukshowall', 'BarangMasukController@ShowAll'); // Tampilkan Semua Barang Keluar

        $router->get('/barangmasuksingle/{id}', 'BarangMasukController@ShowSingle'); // Tampilkan Satu Barang Keluar

        $router->post('/barangmasukinsert', 'BarangMasukController@InsertBarangMasuk'); // Masukkan Barang Keluar Baru

        $router->post('/barangmasukupdate', 'BarangMasukController@updateBarangMasuk'); // Update Barang Keluar

        // ============================== BARANG MASUK ==============================


        // ================================ AUDIT ================================

        $router->get('/auditshowall', 'AuditsController@ShowAll'); // Tampilkan Semua Audit

        $router->get('/auditsingle/{id}', 'AuditsController@ShowSingle'); // Tampilkan Satu Audit

        $router->post('/auditinsert', 'AuditsController@InsertAudit'); // Masukkan Audit Baru

        // ================================ AUDIT ================================


        ###################################### ADVANCED QUERY ######################################

        #================================ BARANG LIST ================================

        $router->get('/toptenbarang', 'BarangListController@TopTenBarang');

        $router->get('/mostbarang', 'BarangListController@MostCreatedBarang');

        $router->get('/nomorbarangonly', 'BarangListController@OnlyNomorBarang');

        #================================ BARANG LIST ================================

        #================================ BARANG KELUAR ================================

        $router->post('/proyek', 'BarangKeluarController@selectBasedProject');
        
        $router->get('/proyekdis', 'BarangKeluarController@DistinctProyek');

        $router->post('/bengkel', 'BarangKeluarController@selectBasedBengkel');
        
        $router->get('/bengkeldis', 'BarangKeluarController@DistinctBengkel');
        
        $router->post('/pekerjaan', 'BarangKeluarController@selectBasedPekerjaan');

        $router->post('/nomorbarangkeluar', 'BarangKeluarController@selectBasedNomorBarang');

        $router->get('/nmrdisbarangkeluar', 'BarangKeluarController@DistinctBarang');

        #================================ BARANG KELUAR ================================

        #================================ BARANG MASUK ================================

        $router->post('/nomorbarangmasuk', 'BarangMasukController@selectBasedNomorBarang');

        $router->post('/asalbarang', 'BarangMasukController@selectBasedAsal');

        $router->post('/nokontrak', 'BarangMasukController@selectBasedNoKontrak');

        $router->get('/nmrdisbarangmasuk', 'BarangMasukController@DistinctBarang');

        $router->get('/asalbarangdis', 'BarangMasukController@DistinctAsal');

        #================================ BARANG MASUK ================================

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
    // return "<h1 style='text-align:center'> FUCK OFF!!!! </h1>";
    // return redirect('http://www.kontol.com');
    return date('Y-m-d H:i:s');
 });