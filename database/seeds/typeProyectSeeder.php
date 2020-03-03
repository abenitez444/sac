<?php

use Illuminate\Database\Seeder;

class typeProyectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array(
            array('Publico'),
            array('Privado')
        );  

        foreach($types as $type){
            DB::table('type_proyects')->insert([
        		'description' => $type[0]
            ]);    
        }
    }
}
