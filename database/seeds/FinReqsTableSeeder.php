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
        factory(App\Models\FinReq::class, 100)->create()->each(function ($fin_req) {
            //create 3 notes for each FinReq
            factory(App\Models\FinReqNote::class, 3)
            ->create([
                'fin_req_id'=>$fin_req->id
            ]);

            factory(App\Models\FinReqRecord::class, 1)
            ->create([
                'fin_req_id'=>$fin_req->id
            ]);
        });
    }
}
