<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(RentalsTableSeeder::class);
        $this->call(TravelsTableSeeder::class);
        $this->call(TravelUsersTableSeeder::class);
    }
}
