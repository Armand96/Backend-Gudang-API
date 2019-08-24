<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(BarangListSeeder::class);
        // $this->call(BarangKeluarSeeder::class);
        $this->call(BarangMasukSeeder::class);
    }
}
