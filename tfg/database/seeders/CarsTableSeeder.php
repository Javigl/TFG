<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->delete();
        DB::table('cars')->insert(['image'=>'car1.jpg', 'brand'=>'Audi','model'=>'Q3', 'licensePlate'=> '1010LVJ',
        'carType'=>'Todoterreno', 'fuelType'=>'Gasolina', 'transmission'=>'Manual', 'places'=>5, 'user_id'=>1]);
        DB::table('cars')->insert(['image'=>'car2.jpg', 'brand'=>'Nissan','model'=>'Juke', 'licensePlate'=> '5500JPM',
        'carType'=>'Todoterreno', 'fuelType'=>'Híbrido', 'transmission'=>'Automático', 'places'=>5, 'user_id'=>1]);
        DB::table('cars')->insert(['image'=>'car3.jpg','brand'=>'Opel','model'=>'GT', 'licensePlate'=> '8985DFT',
        'carType'=>'Descapotable', 'fuelType'=>'Diésel', 'transmission'=>'Manual', 'places'=>2, 'user_id'=>3]);
        DB::table('cars')->insert(['image'=>'car4.jpg', 'brand'=>'BMW','model'=>'Z4', 'licensePlate'=> '2548CRL',
        'carType'=>'Descapotable', 'fuelType'=>'Gasolina', 'transmission'=>'Manual', 'places'=>2, 'user_id'=>4]);
        DB::table('cars')->insert(['image'=>'car5.jpg', 'brand'=>'Dacia','model'=>'Lodgy', 'licensePlate'=> '4621HRD',
        'carType'=>'Mononolumen', 'fuelType'=>'Diésel', 'transmission'=>'Automático', 'places'=>8, 'user_id'=>5]);
        DB::table('cars')->insert(['image'=>'car6.jpg', 'brand'=>'Mercedes','model'=>'E-Class', 'licensePlate'=> '8746GTY',
        'carType'=>'Berlina', 'fuelType'=>'Diésel', 'transmission'=>'Automático', 'places'=>5, 'user_id'=>6]);
        DB::table('cars')->insert(['image'=>'car7.jpg', 'brand'=>'Fiat','model'=>'500', 'licensePlate'=> '2864FRM',
        'carType'=>'Utilitario', 'fuelType'=>'Eléctrico', 'transmission'=>'Automático', 'places'=>5, 'user_id'=>7]);
        DB::table('cars')->insert(['image'=>'car8.jpg', 'brand'=>'Volkswagen','model'=>'Passat', 'licensePlate'=> '3240LMV',
        'carType'=>'Familiar', 'fuelType'=>'Gasolina', 'transmission'=>'Manual', 'places'=>5, 'user_id'=>8]);
        DB::table('cars')->insert(['image'=>'car9.jpg', 'brand'=>'Volkswagen','model'=>'Golf', 'licensePlate'=> '3909LTG',
        'carType'=>'Utilitario', 'fuelType'=>'Híbrido', 'transmission'=>'Automático', 'places'=>5, 'user_id'=>9]);
        DB::table('cars')->insert(['image'=>'car10.jpg', 'brand'=>'Seat','model'=>'León', 'licensePlate'=> '2121JZP',
        'carType'=>'Utilitario', 'fuelType'=>'Gasolina', 'transmission'=>'Manual', 'places'=>5, 'user_id'=>10]);
    }
}
