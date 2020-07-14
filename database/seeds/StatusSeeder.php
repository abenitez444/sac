<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array(
        	array('Activo'),
            array('Inactivo'),
            array('Por hacer'),
            array('En proceso'),
            array('En revisión'),
            array('Terminado'),
            array('Aprobado')
        );  

        /* foreach($status as $statu){
            DB::table('status_project')->insert([
        		'description' => $statu[0]
            ]);    
        } */
    }
}
