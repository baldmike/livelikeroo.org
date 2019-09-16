<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            MessagesTableSeeder::class,
            CarePackagesTableSeeder::class,
            FinReqsTableSeeder::class,
            DonationsTableSeeder::class,
            ItemsTableSeeder::class
        ]);
    }
}
