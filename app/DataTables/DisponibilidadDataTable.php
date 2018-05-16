<?php

namespace App\DataTables;

use App\Models\Disponibilidad;
use Form;
use Yajra\Datatables\Services\DataTable;

class DisponibilidadDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'disponibilidads.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $disponibilidads = Disponibilidad::with('medio','user');

        return $this->applyScopes($disponibilidads);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'Usuario' => ['name' => 'user_id', 'data' => 'user.name'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre'],
            'comentario' => ['name' => 'comentario', 'data' => 'comentario'],
            'condicion' => ['name' => 'condicion', 'data' => 'condicion'],
            'Banco' => ['name' => 'medio_id', 'data' => 'medio.nombre']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'disponibilidads';
    }
}
