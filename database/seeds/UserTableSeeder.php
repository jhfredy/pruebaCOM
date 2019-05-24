<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'name' => 'root',
                'email' => 'root@app.com',
                'password' => bcrypt('12345'),
                'municipio_id' => '1'
                
            ],
            
        ]);
    }
}
