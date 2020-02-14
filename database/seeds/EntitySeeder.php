<?php

use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $entities = array(
            array('Vicepresidencia Ejecutiva de la República')
        );  

        foreach($entities as $entity){
            DB::table('entity')->insert([
        		'name' => $entity[0]
            ]);    
        }
    }
}
