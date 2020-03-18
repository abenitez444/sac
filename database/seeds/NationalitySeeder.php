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
            DB::table('document_type')->insert([
        		'option' => $nac[0]
            ]);    
        }
    }
}
