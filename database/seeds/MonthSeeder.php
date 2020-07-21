<?php

use Illuminate\Database\Seeder;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //=====Meses=======//
        $month = array(
        array("Enero"),
        array("Febrero"),
        array("Marzo"),
        array("Abril"),
        array("Mayo"),
        array("Junio"),
        array("Julio"),
        array("Agosto"),
        array("Septiembre"),
        array("Octubre"),
        array("Noviembre"),
        array("Diciembre"),
    );
      
        foreach ($month as $m) {
         DB::table('month')->insert([
           'month' => $m[0],
       ]);  
    }
    }
}
