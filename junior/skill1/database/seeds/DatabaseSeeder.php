<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        for($i = 1; $i <= 10 ;$i++){
        	DB::table('accounts')->insert([
        		'name' => 'Van A'.$i,
        		'email' => 'A'.$i.'gmail.com',
        		'avatar' => '',


        	]);
        }
        
    }
}
