<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\BarangMasuk::class, function (Faker\Generator $faker) {

    $nomor_barang = ['1386.864', '2189.9007', '3092.500', '3113.4272', '3927.6890'];
    $asal_barang = ['DKB', 'Gal2', 'Gal1'];
    $no_kontrak = ['Kapal', 'Submarine', 'Ship', 'Aircraft Carrier'];
    $keterangan = ['Perbaikan', 'Buat Baru', 'Perawatan'];

    return [
        'asal_barang' => $faker->randomElement($asal_barang),
        'no_kontrak' => $faker->randomElement($no_kontrak),
        'tgl_masuk' => date("Y-m-d H:m:s"),
        'nomor_barang' => $faker->randomElement($nomor_barang),
        'jml_msk_angka' => 10,
        'jml_msk_huruf' => 'Sepuluh',
        'keterangan' => $faker->randomElement($keterangan),
    ];
});

//
