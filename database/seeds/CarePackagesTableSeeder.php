<?php

use Illuminate\Database\Seeder;

class CarePackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\CarePackage::class, 50)->create();
    }
}
