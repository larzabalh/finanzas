<?php

namespace App\DataTables;

use App\Models\FormaDePago;
use Form;
use Yajra\Datatables\Services\DataTable;

class FormaDePagoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'forma_de_pagos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $formaDePagos = FormaDePago::with('disponibilidad','user');

        return $this->applyScopes($formaDePagos);
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
            'user_id' => ['name' => 'user_id', 'data' => 'user.name'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre'],
            'condicion' => ['name' => 'condicion', 'data' => 'condicion'],
            'disponibilidad_id' => ['name' => 'disponibilidad_id', 'data' => 'disponibilidad.nombre']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'formaDePagos';
    }
}
