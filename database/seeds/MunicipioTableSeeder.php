<?php

use Illuminate\Database\Seeder;

class MunicipioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder de municipios
        DB::table('municipios')->insert([
            [
                'id'=>1,
                'municipio' => 'Bogotá',
                'departamento_id' => '1',
                
            ],
            [
                'id'=>2,
                'municipio' => 'Medellin',
                'departamento_id' => '2',
                
            ],
            [
                'id'=>3,
                'municipio' => 'Victoria de Durango',
                'departamento_id' => '3',
                
            ],
            [
                'id'=>4,
                'municipio' => 'Guadalajara',
                'departamento_id' => '4',
                
            ],
            [
                'id'=>5,
                'municipio' => 'Río de Janeiro',
                'departamento_id' => '5',
                
            ],
            [
                'id'=>6,
                'municipio' => 'Distrito Federal',
                'departamento_id' => '6',
                
            ],
            [
                'id'=>7,
                'municipio' => 'La Plata',
                'departamento_id' => '7',
                
            ],
            [
                'id'=>8,
                'municipio' => 'Córdoba',
                'departamento_id' => '8',
                
            ],
        ]);
    }
}
