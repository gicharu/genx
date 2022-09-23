<?php

namespace App\DataTables;

//use App\Models\AuthorsDataTable;
use App\Models\Authors;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AuthorsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($row) {
                        return '<div class="btn-group" role="group">' . '
                        <a title="Edit" class="btn btn-primary" href="'. url('authors/' . $row->id . '/edit') . '"><i class="fas fa-edit"></i></a>' .
                        '<a title="Delete" class="btn btn-danger" href="'. url('authors/' . $row->id . '/destroy') . '"><i class="fas fa-trash"></i></a>
                        </div>'; })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Authors $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('authorsdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('frtip')
                    ->orderBy(0, 'asc');
//                    ->buttons(
//                        Button::make('create'),
//                        Button::make('export'),
//                        Button::make('print'),
//                        Button::make('reset'),
//                        Button::make('reload')
//                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [

            Column::make('first_name'),
            Column::make('surname'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
            //Column::make('created_at'),
            //Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Authors_' . date('YmdHis');
    }
}
