<?php

namespace App\DataTables;

use App\Models\Employee;
use App\Models\Leave;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LeaveDataTable extends DataTable
{
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
            ->addIndexColumn()
            ->addColumn('identification_number', function(Leave $leave){
                return $leave->employee->identification_number;
            })
            ->addColumn('long_leave', function(Leave $leave){
                return $leave->long_leave . ' hari';
            })
            ->addColumn('action', function(Leave $leave){
                return view('pages.leaves.component.action', compact('leave'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Leave $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Leave $model)
    {
        return $model->select('tb_leaves.*')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('leave-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make(["extend" => "excel", 'className' => 'btn btn-inverse-success', 'text' => '<i class="icon-download"></i> Export']),
                        Button::make(["extend" => "print", 'className' => 'btn btn-inverse-primary', 'text' => '<i class="icon-printer"></i> Print']),
                        Button::make(["reload" => "reload", 'className' => 'btn btn-inverse-dark', 'text' => '<i class="mdi mdi-reload"></i> Reload']),
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
            Column::make('identification_number')->title('Nomor Induk')->addClass('text-center'),
            Column::make('leave_date')->title('Tanggal Cuti')->addClass('text-center'),
            Column::make('long_leave')->title('Lama Cuti')->addClass('text-center'),
            Column::make('description')->title('Keterangan')->addClass('text-center'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->orderBy(3, 'desc')
                  ->width(60)
                  ->parameters([
                    "pageLength" => 5
                   ])
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
        return 'Leave_' . date('YmdHis');
    }
}
