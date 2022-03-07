<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->delete();
        DB::table('ratings')->insert(['mark'=>5,'opinion'=>'Excelente anfitrión','user1_id'=>1, 'user2_id'=>2]);
        DB::table('ratings')->insert(['mark'=>4,'opinion'=>'Muy buen anfitrión','user1_id'=>3, 'user2_id'=>4]);
        DB::table('ratings')->insert(['mark'=>3,'opinion'=>'Buen anfitrión','user1_id'=>5, 'user2_id'=>6]);
        DB::table('ratings')->insert(['mark'=>2,'opinion'=>'Regular anfitrión','user1_id'=>7, 'user2_id'=>8]);
        DB::table('ratings')->insert(['mark'=>1,'opinion'=>'Mal anfitrión','user1_id'=>9, 'user2_id'=>10]);
    }
}
