<?php

use Illuminate\Database\Seeder;

class AccountData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 10 ; $i++ ){
        	DB::table('accounts')->insert([
        		'name'	=> "Nguyen van A".$i,
        		'email' => "A".$i."@gmail.com",
        		
        	]);
        }
    }
}
