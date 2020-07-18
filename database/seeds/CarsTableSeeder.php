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
        'prijs' => '275.000',
        'bouwjaar' => '2020',
        'categorie' => 'SUV',
        'transmissie' => 'Automaat',
        'brandstof' => 'Benzine',
        'kmstand' => '10.000 Km',
        'foto' => 'https://944challenge.com/wp-content/uploads/2016/02/car-coming-soon-e1456661642418.jpg'
      ]);
    }
}
