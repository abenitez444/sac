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

        $typeResidence = array(
            array('Apartamento'),
            array('Townhouse'),
            array('Casa'),
        );  

        foreach($typeResidence as $type){
            DB::table('type_residence')->insert([
                'option' => $type[0]
            ]);    
        }

        $structure = array(
            array('Central'),
            array('Esquina'),
            array('Pen house'),
        );  

        foreach($structure as $type){
            DB::table('structure')->insert([
                'option' => $type[0]
            ]);    
        }

         $money = array(
            array('Bolívares'),
            array('Dolares'),
            array('Euros'),
        );  

        foreach($money as $type){
            DB::table('type_money')->insert([
                'option' => $type[0]
            ]);    
        }
    }
}
