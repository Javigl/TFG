<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TravelUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('travel_users')->delete();
        DB::table('travel_users')->insert(['user_id'=>1, 'travel_id' =>1]);
        DB::table('travel_users')->insert(['user_id'=>2, 'travel_id' =>2]);
        DB::table('travel_users')->insert(['user_id'=>3, 'travel_id' =>1]);
        DB::table('travel_users')->insert(['user_id'=>4, 'travel_id' =>1]);
        DB::table('travel_users')->insert(['user_id'=>5, 'travel_id' =>1]);
        DB::table('travel_users')->insert(['user_id'=>1, 'travel_id' =>6]);
        DB::table('travel_users')->insert(['user_id'=>2, 'travel_id' =>7]);
        DB::table('travel_users')->insert(['user_id'=>3, 'travel_id' =>8]);
        DB::table('travel_users')->insert(['user_id'=>4, 'travel_id' =>9]);
        DB::table('travel_users')->insert(['user_id'=>5, 'travel_id' =>2]);
    }
}
