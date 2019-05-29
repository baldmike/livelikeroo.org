<?php

use Illuminate\Database\Seeder;

class CarePackagesSeeder extends Seeder
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
