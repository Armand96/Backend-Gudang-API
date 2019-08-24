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

$factory->define(App\BarangKeluar::class, function (Faker\Generator $faker) {

    $nomor_barang = ['1386.864', '2189.9007', '3092.500', '3113.4272', '3927.6890'];
    $bengkel = ['DKB', 'Gal2', 'Gal1'];
    $proyek = ['Kapal', 'Submarine', 'Ship', 'Aircraft Carrier'];
    $pekerjaan = ['Perbaikan', 'Buat Baru', 'Perawatan'];

    return [
        'proyek' => $faker->randomElement($proyek),
        'no_order' => $faker->randomNumber(2),
        'bengkel' => $faker->randomElement($bengkel),
        'pekerjaan' => $faker->randomElement($pekerjaan),
        'kode_pekerjaan' => $faker->randomNumber(2),
        'tgl_keluar' => date("Y-m-d H:m:s"),
        'nomor_barang' => $faker->randomElement($nomor_barang),
        'jml_klr_permintaan_angka' => 10,
        'jml_klr_permintaan_huruf' => 'Sepuluh',
        'jml_klr_angka' => 10,
        'jml_klr_huruf' => 'Sepuluh',
    ];
});

//
