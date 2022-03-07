<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('travels')->delete();
        DB::table('travels')->insert(['origin'=>'Alicante','destination'=>'Madrid','date'=>'2021-12-15', 'hour'=>'13:30:00','places'=>4,'price/place'=>30.0, 'user_id'=> 2]);
        DB::table('travels')->insert(['origin'=>'Pamplona','destination'=>'Vitoria','date'=>'2021-12-15', 'hour'=>'13:00:00', 'places'=>5,'price/place'=>25.50, 'user_id'=> 1]);
        DB::table('travels')->insert(['origin'=>'Madrid','destination'=>'Salamanca','date'=>'2021-12-15', 'hour'=>'12:00:00', 'places'=>3,'price/place'=>40.30, 'user_id'=> 3]);
        DB::table('travels')->insert(['origin'=>'Sevilla','destination'=>'Almería','date'=>'2021-12-15', 'hour'=>'14:00:00', 'places'=>2,'price/place'=>20.0, 'user_id'=> 4]);
        DB::table('travels')->insert(['origin'=>'Murcia','destination'=>'Alicante','date'=>'2021-12-15', 'hour'=>'16:00:00', 'places'=>5,'price/place'=>15.0, 'user_id'=> 5]);
        DB::table('travels')->insert(['origin'=>'Bilbao','destination'=>'San Sebastián','date'=>'2021-12-16', 'hour'=>'17:00:00', 'places'=>4,'price/place'=>25.0, 'user_id'=> 5]);
        DB::table('travels')->insert(['origin'=>'Valencia','destination'=>'Albacete','date'=>'2021-12-16', 'hour'=>'17:00:00', 'places'=>4,'price/place'=>10.0, 'user_id'=> 6]);
        DB::table('travels')->insert(['origin'=>'Castellón','destination'=>'Zaragoza','date'=>'2021-12-16', 'hour'=>'17:00:00', 'places'=>2,'price/place'=>15.0, 'user_id'=> 7]);
        DB::table('travels')->insert(['origin'=>'Tarragona','destination'=>'Girona','date'=>'2021-12-16', 'hour'=>'17:00:00', 'places'=>3,'price/place'=>18.0, 'user_id'=> 8]);
    }
}
