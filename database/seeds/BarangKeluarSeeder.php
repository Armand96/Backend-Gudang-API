<?php

use Illuminate\Database\Seeder;

class BarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BarangKeluar::class, 10)->create();
    }
}
