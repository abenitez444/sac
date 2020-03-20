<?php

use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentType = array(
            array('V'),
            array('E'),
            array('P'),
            array('J'),
            array('G'),
        );  

        foreach($documentType as $type){
            DB::table('document_type')->insert([
        		'option' => $type[0]
            ]);    
        }
    }
}
