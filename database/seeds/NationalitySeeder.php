<?php

use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $nationality = array(
            array('V'),
            array('E'),
        );  

        foreach($nationality as $nac){
            DB::table('nationality')->insert([
        		'opcion' => $nac[0]
            ]);    
        }
    }
}
