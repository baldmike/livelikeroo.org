<?php

use Illuminate\Database\Seeder;

class FinReqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\FinReq::class, 25)->create();
    }
}
