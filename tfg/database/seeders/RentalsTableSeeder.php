<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RentalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rentals')->delete();
        DB::table('rentals')->insert(['city'=>'Alicante', 'pickUpDate'=>'2022-02-15','returnDate'=>'2022-02-18', 'price'=> 50.45, 'car_id'=>1, 'user_id'=>1]);
        DB::table('rentals')->insert(['city'=>'Gijón', 'pickUpDate'=>'2022-03-01','returnDate'=>'2022-03-10', 'price'=> 20.0, 'car_id'=>2]);
        DB::table('rentals')->insert(['city'=>'Ávila', 'pickUpDate'=>'2022-02-28','returnDate'=>'2022-03-04', 'price'=> 25.0, 'car_id'=>3, 'user_id'=>5]);
        DB::table('rentals')->insert(['city'=>'Madrid', 'pickUpDate'=>'2022-02-15','returnDate'=>'2022-02-20', 'price'=> 120.0, 'car_id'=>4, 'user_id'=>6]);
        DB::table('rentals')->insert(['city'=>'Barcelona', 'pickUpDate'=>'2022-03-15','returnDate'=>'2022-03-19', 'price'=> 60.0, 'car_id'=>5]);
        DB::table('rentals')->insert(['city'=>'Valencia', 'pickUpDate'=>'2022-02-08','returnDate'=>'2022-02-13', 'price'=> 45.0, 'car_id'=>6]);
    }
}
