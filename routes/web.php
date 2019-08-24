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


$router->group(['prefix'=>'api'], function() use($router){

    $router->get('/', function () use ($router) {
        return $router->app->version();
    });
    
    // ============================ ga danta ============================
    // $router->get('/key', 'UserController@generateKey');
    
    // $router->post('/tespost', function () {
    //     return 'abcd';
    // });
    // ============================ ga danta ============================
    


    // ================================= USER =================================
    $router->get('/userall', 'UserController@index'); //Tampilkan Semua User
    
    $router->get('/usersingle/{id}', 'UserController@singleUser'); //Tampilkan Satu User
    
    $router->post('/userinsert', 'UserController@newUser'); //Masukkan User Baru
    
    $router->post('/userupdate', 'UserController@updateUser'); //Update User
    
    // ================================= USER =================================
    


    // ================================= LIST BARANG =================================

    $router->get('/barangshowall', 'BarangListController@ShowAll'); // Tampilkan Semua Barang

    $router->post('/barangsingle', 'BarangListController@ShowSingle'); // Tampilkan Satu Barang

    $router->post('/baranginsert', 'BarangListController@InsertBarang'); // Masukkan Barang Baru

    $router->post('/barangupdate', 'BarangListController@updateBarang'); // Update Barang

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

    $router->post('/barangmasukupdate', 'BarangMauskController@updateBarangMasuk'); // Update Barang Keluar

    // ============================== BARANG MASUK ==============================


    // ================================ AUDIT ================================

    $router->get('/auditshowall', 'AuditController@ShowAll'); // Tampilkan Semua Audit

    $router->get('/auditsingle/{id}', 'AuditController@ShowSingle'); // Tampilkan Satu Audit

    $router->post('/auditinsert', 'AuditController@InsertAudit'); // Masukkan Audit Baru

    // ================================ AUDIT ================================



    ###################################### ADVANCED QUERY ######################################

    #================================ BARANG LIST ================================

    $router->get('/toptenbarang', 'BarangListController@TopTenBarang');

    $router->get('/mostbarang', 'BarangListController@MostCreatedBarang');

    #================================ BARANG LIST ================================

    #================================ BARANG KELUAR ================================

    $router->post('/proyek', 'BarangKeluarController@selectBasedProject');

    $router->post('/bengkel', 'BarangKeluarController@selectBasedBengkel');
    
    $router->post('/pekerjaan', 'BarangKeluarController@selectBasedPekerjaan');

    $router->post('/nomorbarangkeluar', 'BarangKeluarController@selectBasedNomorBarang');

    #================================ BARANG KELUAR ================================

    #================================ BARANG MASUK ================================

    $router->post('/nomorbarangmasuk', 'BarangMasukController@selectBasedNomorBarang');

    $router->post('/asalbarang', 'BarangMasukController@selectBasedAsal');

    $router->post('/nokontrak', 'BarangMasukController@selectBasedNoKontrak');

    #================================ BARANG MASUK ================================

    #### =============================== DASHBOARD ============================= ####
    $router->get('/countbarangmasuk', 'BarangMasukController@CountBarangMasuk');

    $router->get('/countbarangkeluar', 'BarangKeluarController@CountBarangKeluar');

    $router->get('/countbarang', 'BarangListController@CountBarang');
    #### =============================== DASHBOARD ============================= ####

    ###################################### ADVANCED QUERY ######################################
});