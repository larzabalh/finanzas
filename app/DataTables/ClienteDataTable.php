<?php

namespace App\DataTables;

use App\Models\Cliente;
use Form;
use Yajra\Datatables\Services\DataTable;

class ClienteDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'clientes.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $clientes = Cliente::with('user','facturador','liquidador','cobrador','disponibilidad');

        return $this->applyScopes($clientes);
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
            'cliente' => ['name' => 'cliente', 'data' => 'cliente'],
            'honorario' => ['name' => 'honorario', 'data' => 'honorario'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'facturador_id' => ['name' => 'facturador_id', 'data' => 'facturador.facturador'],
            'liquidador_id' => ['name' => 'liquidador_id', 'data' => 'liquidador.liquidador'],
            'cobrador_id' => ['name' => 'cobrador_id', 'data' => 'cobrador.cobrador'],
            'disponibilidad_id' => ['name' => 'disponibilidad_id', 'data' => 'disponibilidad.nombre'],
            'contacto' => ['name' => 'contacto', 'data' => 'contacto'],
            'comentario' => ['name' => 'comentario', 'data' => 'comentario'],
            'condicion' => ['name' => 'condicion', 'data' => 'condicion']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'clientes';
    }
}
