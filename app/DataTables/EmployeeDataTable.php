<?php

namespace App\DataTables;

use App\Models\Employee;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class EmployeeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query, Request $request)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('take_total_leave', function(Employee $employee){
                return $employee->leaves->count() . ' kali';
            })
            ->addColumn('total_leave', function(Employee $employee){
                return $employee->leaves->sum('long_leave') . ' hari';
            })
            ->addColumn('remaining_leave', function(Employee $employee){
                //calculate remaining
                return $employee->totalLeave - $employee->leaves->sum('long_leave') . ' hari';
            })
            ->addColumn('action', function(Employee $employee){
                return view('pages.employee.component.action', compact('employee'));
            })
            ->filter(function($query) use($request) {
                if($request->has('operator') && $request->input('operator') != null){
                    $operator = $request->get('operator');
                    return $query->withCount('leaves')->having('leaves_count', $operator, 1);
                }else{
                    return $query->get();
                }
             
            }, true);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
    {
        return $model->select('tb_employees.*')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('employee-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(5, 'asc')
                    ->parameters([
                        "pageLength" => 3
                    ])
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
            Column::computed('DT_RowIndex')->title('No.')->addClass('text-center'),
            Column::make('identification_number')->title('Nomor Induk')->addClass('text-center'),
            Column::make('name')->title('Nama')->addClass('text-center'),
            Column::make('address')->title('Alamat')->addClass('text-center'),
            Column::make('date_of_birth')->title('Tanggal Lahir')->addClass('text-center'),
            Column::make('join_date')->title('Tanggal Bergabung')->addClass('text-center'),
            Column::make('take_total_leave')->title('Total Ambil Cuti')->addClass('text-center'),
            Column::make('total_leave')->title('Total Cuti')->addClass('text-center'),
            Column::make('remaining_leave')->title('Sisa Cuti')->addClass('text-center'),
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
        return 'Employee_' . date('YmdHis');
    }
}
