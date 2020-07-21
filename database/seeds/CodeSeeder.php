<?php

use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $code = array(
            array('0412'),
            array('0414'),
            array('0424'),
            array('0416'),
            array('0426'),
        );  

        foreach($code as $phone){
            DB::table('code_phone')->insert([
        		'option' => $phone[0]
            ]);    
        }
    }
}
