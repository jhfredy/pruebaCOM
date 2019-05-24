T<?php

use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //seeder de paises
        DB::table('paises')->insert([
            [
                'id'=>1,
                'pais' => 'Colombia',
                
            ],
            [
                'id'=>2,
                'pais' => 'México',
                
            ],
            [
                'id'=>3,
                'pais' => 'Brazil',
                
            ],
            [
                'id'=>4,
                'pais' => 'Argentina',
                
            ],
        ]);
    }
}
