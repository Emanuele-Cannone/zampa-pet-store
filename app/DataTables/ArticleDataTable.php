<?php

namespace App\DataTables;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Vite;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ArticleDataTable extends DataTable
{
    protected string|array $exportColumns = [
        'description',
    ];

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($row) {
                return '<a href="articles/'.$row->id.'/edit" class="btn btn-warning">Edit</a>
                        <button data-article="'.$row->id.'" class="btn btn-danger open-delete-modal">Delete</button>';
            })
            ->addColumn('is_active_label', function($row) {
                return $row->is_active_label;
            })
            ->addColumn('in_order_label', function($row) {
                return $row->in_order_label;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Article $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('articles-table')
            ->columns($this->getColumns())
            ->language(Vite::asset('resources/datatable/lang/it.json'))
            ->minifiedAjax()
            ->orderBy(1)
            ->buttons([
                Button::make('add'),
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('ean_code')->title(__('article.ean_code')),
            Column::make('product_code')->title(__('article.product_code')),
            Column::make('description')->title(__('article.description')),
            Column::make('is_active_label')->title(__('article.is_active')),
            Column::make('in_order_label')->title(__('article.in_order')),
            Column::make('action')->title(__('common.actions')),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Articles_' . date('YmdHis');
    }
}
