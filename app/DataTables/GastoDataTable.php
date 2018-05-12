<?php

namespace App\DataTables;

use App\Models\Gasto;
use Form;
use Yajra\Datatables\Services\DataTable;

class GastoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'gastos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $gastos = Gasto::with('tipo_de_gasto','user');

        return $this->applyScopes($gastos);
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
            'gasto' => ['name' => 'gasto', 'data' => 'gasto'],
            'user_id' => ['name' => 'user_id', 'data' => 'user.name'],
            'condicion' => ['name' => 'condicion', 'data' => 'condicion'],
            'tipo_de_gasto_id' => ['name' => 'tipo_de_gasto_id', 'data' => 'tipo_de_gasto.tipo']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'gastos';
    }
}
