<?php

namespace App\DataTables;

use App\Models\Inventory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\JsonResponse;


class InventoryDataTable extends DataTable
{

    protected $exportClass = DataTableExport::class;
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->of($query)
            ->addColumn('action', function($query){

                $html = '<a href="'.route('detail',$query->id).'" class="icono" title="Visualizar"  id="btn-detailInventory" data-toggle="modal" data-target="#modal-detailInventory" data-whatever="'.$query->id.'"><b class="fa fa-eye"></b></a>';
                /*$html .= ' <a href="'.route('bms.imprimir',$query->id).'" class="icono" title="Imprimir"><b class="fa fa-print"></b></a>';*/
                $html .= ' <a href="'.route('edit',$query->id).'" class="icono" title="Editar"><b class="fa fa-edit"></b></a>';
   /*             if (auth()->user()->rol == 1) {
                    $html .= ' <a href="#" class="icono" title="Eliminar" onclick="deleteBMS('.$query->id.')"><b class="fa fa-trash"></b></a>';
                }*/
                $html .= ' <a href="#" class="icono" title="Eliminar" onclick="deletedInventory('.$query->id.')"><b class="radiusM fa fa-trash"></b></a>';
                
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\InventoryDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = Inventory::join('entity', 'inventory.entity_id', '=', 'entity.id')
            ->select('inventory.id as id', 'inventory.dependencia as dependencia', 'inventory.ubicacion as ubicacion', 'inventory.responsable as responsable', 'inventory.codigo_interno as codigo_interno', 'inventory.descripcion as descripcion', 'inventory.serial as serial', 'inventory.modelo as modelo', 'inventory.marca as marca', 'inventory.cantidad as cantidad', 'inventory.especificacion as especificacion', 'inventory.detalle as detalle', 'entity.name as entity' );
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('inventory-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                    )->parameters([
                        'searching' => true,
                        'info' => false,
                        'responsive' => true,
                        'language' => [
                            'url' => url('//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json')
                        ],
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('dependencia')->width(60),
            Column::make('ubicacion'),
            Column::make('responsable'),
            Column::make('codigo_interno'),
            Column::make('descripcion'),
            Column::make('serial')->visible(false)->searchable(false),
            Column::make('modelo'),
            Column::make('marca'),
            Column::make('cantidad')->visible(false)->searchable(false),
            Column::make('especificacion')->visible(false)->searchable(false),
            Column::make('detalle'),
            Column::make('entity')->title('Ente')->name('entity.name'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Inventory_' . date('YmdHis');
    }

    public function excel()
    {
        $ext = '.' . strtolower($this->excelWriter);

        return $this->buildExcelFile()->download($this->getFilename() . $ext, \Maatwebsite\Excel\Excel::XLSX);
    }

}
