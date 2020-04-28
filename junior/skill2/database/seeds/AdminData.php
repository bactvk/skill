<?php

use Illuminate\Database\Seeder;

class AdminData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $username = "admin123";
        $pass = "admin123";
        DB::table('admin')->insert([
        	'username'	=> $username,
        	'password'	=> bcrypt($pass),
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s')

        ]);
    }
}
