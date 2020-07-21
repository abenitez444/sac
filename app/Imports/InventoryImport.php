<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class InventoryImport implements ToModel, WithCustomCsvSettings
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $id = \Cache::get('id');
        
        return new Inventory([
            'dependencia'  => $row[1],
            'ubicacion'    => $row[2], 
            'responsable' => $row[3],
            'codigo_interno' => $row[4],
            'descripcion' => $row[5],
            'serial' => $row[6],
            'modelo' => $row[7],
            'marca' => $row[8],
            'cantidad' => $row[9],
            'especificacion' => $row[10],
            'detalle' => $row[11],
            'entity_id' => $id
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'delimiter' => ';',
            'contiguous' => true
        ];
    }
}
