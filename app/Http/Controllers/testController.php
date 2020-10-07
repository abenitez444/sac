<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Registro;

class testController extends Controller
{

    public function index(){

        return view('data');
    }

    public function saveData(Request $request){
        
    //    $offset = $request->offset;
    //    $length = 5000;
    //    $file = file(public_path('file\doc1.txt'));
    //    $arr = array_slice($file,$offset,$length);
       
    //     for($s=0;$s < count($arr); $s++){
            
    //         $row = explode("þ", $arr[$s]);
    //         Registro::create([
    //             'cod_estado' => intval($row[0]), 
    //             'cod_municipio' => intval($row[1]),   
    //             'cod_parroquia' => intval($row[2]),
    //             'nacionalidad' => $row[3],
    //             'cedula_identidad' => $row[4],
    //             'apellidos_nombres' => $row[5],
    //             'fec_nacimiento' => $row[6],
    //             'estado_civil' => $row[7],
    //             'sexo' => $row[8],
    //             'centro_nuevo' => intval($row[9]),
    //             'centro_viejo' => intval($row[10])
    //         ]);

    //     }

        
    //     $reload = ($offset + $length) >= count($file) ? false : true;
        
    //     $response = array();
    //     $response['offset'] = $offset;
    //     $response['first']= explode("þ", $arr[0])[4];
    //     $response['last'] = explode("þ", end($arr))[4];
    //     $response['length'] = $length;
    //     $response['reload'] = $reload;
        
    //     return json_encode($response);
        
    $f = fopen(public_path('file\doc2.csv'), 'r');

    while (($data = fgetcsv($f, 3000, ';')) !== false) {
    
        if($data[1] === 'DTTO. CAPITAL'){

            Data::create([
                'cod_estado' =>$data[0],
                'des_estado' =>$data[1],
                'cod_municipio' =>$data[2],
                'des_municipio' =>$data[3],
                'cod_parroquia' =>$data[4],
                'des_parroquia' =>$data[5],
                'codigo' =>$data[6],
                'nombre' =>$data[7],
                'direccion' =>$data[8],
                'mesa' =>$data[9],
                'terminal_desde' =>$data[10],
                'terminal_hasta' =>$data[11],
                'votantes_evento' =>$data[12],
                'tecnologia' =>$data[13]
            ]);
        }
    }

    dd("ya");
        
    }
}
