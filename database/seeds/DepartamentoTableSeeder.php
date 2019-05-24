<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder de departamentos
        DB::table('departamentos')->insert([
            [
                'id'=>1,
                'departamento' => 'Bogotá',
                'pais_id' => '1',
                
            ],
            [
                'id'=>2,
                'departamento' => 'Antioquia',
                'pais_id' => '1',
                
            ],
            [
                'id'=>3,
                'departamento' => 'Durango',
                'pais_id' => '2',
                
            ],
            [
                'id'=>4,
                'departamento' => 'Jalisco',
                'pais_id' => '2',
                
            ],
            [
                'id'=>5,
                'departamento' => 'Río de Janeiro',
                'pais_id' => '3',
                
            ],
            [
                'id'=>6,
                'departamento' => 'Brasilia',
                'pais_id' => '3',
                
            ],
            [
                'id'=>7,
                'departamento' => 'Buenos Aires',
                'pais_id' => '4',
                
            ],
            [
                'id'=>8,
                'departamento' => 'Córdoba',
                'pais_id' => '4',
                
            ],
        ]);
    }
}
