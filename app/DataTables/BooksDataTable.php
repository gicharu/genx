<?php

namespace App\DataTables;

use App\Models\Books;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BooksDataTable extends DataTable
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
            ->editColumn('booksAuthor ', function($row) {
                $bookAuthor = '';
                foreach ($row->authors as $author) {
                    $bookAuthor .= $author->first_name . ' ' . $author->surname . ', ';
                }
                return trim($bookAuthor, " ,\t\n");
            })
            ->addColumn('action', function($row) {
                return '<div class="btn-group" role="group">' . '
                        <a title="Edit" class="btn btn-primary" href="'. url('books/' . $row->id . '/edit') . '"><i class="fas fa-edit"></i></a>' .
                    '<a title="Delete" class="btn btn-danger" href="'. url('books/' . $row->id . '/destroy') . '"><i class="fas fa-trash"></i></a>
                        </div>'; })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Books $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Books $model): QueryBuilder
    {
        return $model->newQuery()->with(['authors']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('booksdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('frtip')
                    ->orderBy(1);


    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::computed('booksAuthor', 'Author(s)'),
            Column::make('title'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Books_' . date('YmdHis');
    }
}
