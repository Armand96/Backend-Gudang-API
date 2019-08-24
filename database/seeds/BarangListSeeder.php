<?php

use Illuminate\Database\Seeder;

class BarangListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BarangList::class, 10)->create();
    }
}
