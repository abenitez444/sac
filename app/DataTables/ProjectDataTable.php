<?php

namespace App\DataTables;

use App\Models\Project;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProjectDataTable extends DataTable
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
            ->eloquent($query)
            ->addColumn('action', function($query){

                $html = '<a href="'.route('project.show',$query->id).'" class="icono" title="Visualizar"><b class="fa fa-eye"></b></a>';
                /*$html .= ' <a href="'.route('bms.imprimir',$query->id).'" class="icono" title="Imprimir"><b class="fa fa-print"></b></a>';*/
                $html .= ' <a href="" class="icono" title="Editar" data-toggle="modal" data-target="#modal-createProject" data-whatever="'.$query->id.'" ><b class="fa fa-edit"></b></a>';
   /*             if (auth()->user()->rol == 1) {
                    $html .= ' <a href="#" class="icono" title="Eliminar" onclick="deleteBMS('.$query->id.')"><b class="fa fa-trash"></b></a>';
                }*/
                return $html;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Project $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('projectTable')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('date_start'),
            Column::make('date_end'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
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
        return 'Project_' . date('YmdHis');
    }
}
