<?php

namespace App\DataTables;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BookDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('status', function ($row) {
                $badge = $row->status
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Nonaktif</span>';

                return $badge;
            })
            ->addColumn('action', function ($row) {
                $action = '<a href="' . route('books.show', $row->id) . '" class="btn btn-info"><i class="bx bx-detail"></i></a>';
                $action .= '<a href="' . route('books.edit', $row->id) . '" class="btn btn-success"><i class="bx bx-pencil"></i></a>';
                $action .= '<button data-action="' . route('books.destroy', $row->id) . '" data-name="' . $row->name . '" class="btn btn-danger delete-btn"><i class="bx bx-trash"></i></button>';
                return '<div class="d-flex gap-1">' . $action . '</div>';
            })
            ->rawColumns(['status', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Book $model): QueryBuilder
    {
        return $model->newQuery()
            ->when($this->category_id, function ($query) {
                $query->where('category_id', $this->category_id);
            });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('books-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->processing(true)
            ->selectStyleSingle()
            ->parameters(['order' => [2, 'DESC']])
            ->ajax(['data' => 'function(d) {
                d.category_id = $("#category").val();
            }']);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->orderable(false)
                ->searchable(false)
                ->width(30),
            Column::make('title')
                ->title('Judul'),
            Column::make('isbn')
                ->title('ISBN'),
            Column::make('author')
                ->title('Penulis'),
            Column::make('publisher')
                ->title('Penerbit'),
            Column::make('year')
                ->title('Tahun'),
            Column::make('stock')
                ->title('Stok'),
            Column::make('status')
                ->title('Peminjaman')
                ->width(100),
            Column::make('updated_at')
                ->title('Terakhir diubah')
                ->width(150),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Book_' . date('YmdHis');
    }
}
