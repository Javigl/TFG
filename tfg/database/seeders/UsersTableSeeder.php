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
        'lastname'=>'López López', 'dni'=>'01010101E', 'telephone'=>965965595, 'balance'=>0.0, 'points'=>100, 'admin'=>false, 'blocked'=>false]);

        DB::table('users')->insert(['name'=>'Juan','email'=>'juan@gmail.com', 'password'=>Hash::make('1111'),
        'lastname'=>'Saez Hernandez', 'dni'=>'60600101E', 'telephone'=>965965222, 'admin'=>true, 'blocked'=>false]);

        DB::table('users')->insert(['name'=>'Pepe','email'=>'pepe@gmail.com', 'password'=>Hash::make('1234567'),
        'lastname'=>'García Martínez', 'dni'=>'01030221E', 'telephone'=>965888595, 'balance'=>150.50, 'points'=>200, 'admin'=>false, 'blocked'=>false]);

        DB::table('users')->insert(['name'=>'Jose','email'=>'jose@gmail.com', 'password'=>Hash::make('1234jose'),
        'lastname'=>'Torres Sánchez', 'dni'=>'01111221E', 'telephone'=>965888522, 'balance'=>201.50, 'points'=>125, 'admin'=>false, 'blocked'=>false]);

        DB::table('users')->insert(['name'=>'Humberto','email'=>'humberto@gmail.com', 'password'=>Hash::make('1234'),
        'lastname'=>'Pereiro Jomerán', 'dni'=>'01113442S', 'telephone'=>969988522, 'balance'=>340.90, 'points'=>60, 'admin'=>false, 'blocked'=>true]);

        DB::table('users')->insert(['name'=>'Carla','email'=>'carla@gmail.com', 'password'=>Hash::make('carlitalamejor'),
        'lastname'=>'Bernabeu Ortiz', 'dni'=>'22211221E', 'telephone'=>965882322, 'balance'=>0.0, 'points'=>20, 'admin'=>false, 'blocked'=>false]);

        DB::table('users')->insert(['name'=>'Javier','email'=>'javier@gmail.com', 'password'=>Hash::make('javier09090'),
        'lastname'=>'Perez Ruiz', 'dni'=>'22211991E', 'telephone'=>965111322, 'balance'=>100.50, 'points'=>85, 'admin'=>false, 'blocked'=>true]);

        DB::table('users')->insert(['name'=>'Marina','email'=>'marina@gmail.com', 'password'=>Hash::make('marinablasco121212'),
        'lastname'=>'Blasco Navarro', 'dni'=>'74194545E', 'telephone'=>646321322, 'balance'=>20.50, 'points'=>55, 'admin'=>false, 'blocked'=>false]);

        DB::table('users')->insert(['name'=>'Luis','email'=>'luis@gmail.com', 'password'=>Hash::make('luisluis00'),
        'lastname'=>'Jimenez Muñoz', 'dni'=>'85444444W', 'telephone'=>646321322, 'balance'=>110.25, 'points'=>45, 'admin'=>false, 'blocked'=>false]);

        DB::table('users')->insert(['name'=>'Eric','email'=>'eric@gmail.com', 'password'=>Hash::make('11111'),
        'lastname'=>'González Martínez', 'dni'=>'12345678A', 'telephone'=>965123666, 'balance'=>201.50, 'points'=>125, 'admin'=>false, 'blocked'=>true]);

        DB::table('users')->insert(['name'=>'Sofia','email'=>'sofia@gmail.com', 'password'=>Hash::make('sofiagonzalez1100'),
        'lastname'=>'García Ferrer', 'dni'=>'55345678A', 'telephone'=>965123336, 'balance'=>170.40, 'points'=>125, 'admin'=>false, 'blocked'=>false]);
    }
}
