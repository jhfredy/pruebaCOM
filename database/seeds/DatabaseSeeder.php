<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaisesTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(MunicipioTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
