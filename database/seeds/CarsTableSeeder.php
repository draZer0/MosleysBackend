<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cars')->insert([
        'merk' =>  'Lamborghini',
        'type' => 'Urus',
        'bouwjaar' => '2020',
        'categorie' => 'SUV',
        'transmissie' => 'Automaat',
        'brandstof' => 'Benzine',
        'kmstand' => '10.000 Km'
      ]);
    }
}
