<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert(['name'=>'Maria','email'=>'maria@gmail.com', 'password'=>Hash::make('1234'),
        'lastname'=>'López López', 'telephone'=>965965595, 'balance'=>0.0, 'points'=>100, 'birthday'=> '1990-10-10', 'admin'=>false, 'blocked'=>false, 'created_at'=>'2022-04-16']);

        DB::table('users')->insert(['name'=>'Juan','email'=>'juan@gmail.com', 'password'=>Hash::make('1111'),
        'lastname'=>'Saez Hernandez', 'telephone'=>965965222, 'birthday'=> '1990-10-10', 'admin'=>true, 'blocked'=>false, 'created_at'=>'2022-04-16']);

        DB::table('users')->insert(['name'=>'Pepe','email'=>'pepe@gmail.com', 'password'=>Hash::make('1234567'),
        'lastname'=>'García Martínez', 'telephone'=>965888595, 'balance'=>150.50, 'points'=>200, 'birthday'=> '1990-10-10', 'admin'=>false, 'blocked'=>false, 'created_at'=>'2022-04-16']);

        DB::table('users')->insert(['name'=>'Jose','email'=>'jose@gmail.com', 'password'=>Hash::make('1234jose'),
        'lastname'=>'Torres Sánchez', 'telephone'=>965888522, 'balance'=>201.50, 'points'=>125, 'birthday'=> '1990-10-10', 'admin'=>false, 'blocked'=>false, 'created_at'=>'2022-04-16']);

        DB::table('users')->insert(['name'=>'Humberto','email'=>'humberto@gmail.com', 'password'=>Hash::make('1234'),
        'lastname'=>'Pereiro Jomerán', 'telephone'=>969988522, 'balance'=>340.90, 'points'=>60, 'birthday'=> '1990-10-10', 'admin'=>false, 'blocked'=>true, 'created_at'=>'2022-04-16']);

        DB::table('users')->insert(['name'=>'Carla','email'=>'carla@gmail.com', 'password'=>Hash::make('carlitalamejor'),
        'lastname'=>'Bernabeu Ortiz', 'telephone'=>965882322, 'balance'=>0.0, 'points'=>20, 'birthday'=> '1990-10-10', 'admin'=>false, 'blocked'=>false, 'created_at'=>'2022-04-16']);

        DB::table('users')->insert(['name'=>'Javier','email'=>'javier@gmail.com', 'password'=>Hash::make('javier09090'),
        'lastname'=>'Perez Ruiz', 'telephone'=>965111322, 'balance'=>100.50, 'points'=>85, 'birthday'=> '1990-10-10', 'admin'=>false, 'blocked'=>true, 'created_at'=>'2022-04-16']);

        DB::table('users')->insert(['name'=>'Marina','email'=>'marina@gmail.com', 'password'=>Hash::make('marinablasco121212'),
        'lastname'=>'Blasco Navarro', 'telephone'=>646321322, 'balance'=>20.50, 'points'=>55, 'birthday'=> '1990-10-10', 'admin'=>false, 'blocked'=>false, 'created_at'=>'2022-04-16']);

        DB::table('users')->insert(['name'=>'Luis','email'=>'luis@gmail.com', 'password'=>Hash::make('luisluis00'),
        'lastname'=>'Jimenez Muñoz', 'telephone'=>646321322, 'balance'=>110.25, 'points'=>45, 'birthday'=> '1990-10-10', 'admin'=>false, 'blocked'=>false, 'created_at'=>'2022-04-16']);

        DB::table('users')->insert(['name'=>'Eric','email'=>'eric@gmail.com', 'password'=>Hash::make('11111'),
        'lastname'=>'González Martínez', 'telephone'=>965123666, 'balance'=>201.50, 'points'=>125, 'birthday'=> '1990-10-10', 'admin'=>false, 'blocked'=>true, 'created_at'=>'2022-04-16']);

        DB::table('users')->insert(['name'=>'Sofia','email'=>'sofia@gmail.com', 'password'=>Hash::make('sofiagonzalez1100'),
        'lastname'=>'García Ferrer', 'telephone'=>965123336, 'balance'=>170.40, 'points'=>125, 'birthday'=> '1990-10-10', 'admin'=>false, 'blocked'=>false, 'created_at'=>'2022-04-16']);
    }
}
