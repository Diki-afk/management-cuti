<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeDataTable $employeeDataTable)
    {
        return $employeeDataTable->render('pages.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->all();

        //create data
        Employee::create($data);

        return redirect()->back()->with('status', "
            <script>
                swal({
                text: 'Data karyawan Berhasil Disimpan',
                icon: 'success',
                timer: 1500,
                buttons: false,
                });
            </script>"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('pages.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $data = $request->all();
        //check data
        $employee = Employee::find($id);

        //validation data from input
        Validator::make($data , [
            'name' => ['required','max:255'],
        ])->validate();
        
        //update data
        $employee->update($data);

        return redirect()->back()->with('status', "
            <script>
                swal({
                text: 'Data Karyawan Berhasil Disimpan',
                icon: 'success',
                timer: 1500,
                buttons: false,
                });
            </script>
        ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //check data
        $employee = Employee::find($id);

        //delete data
        $employee->delete();

        return redirect()->back()->with('status', "
            <script>
                swal({
                text: 'Data Pegawai Berhasil Dihapus',
                icon: 'success',
                timer: 1500,
                buttons: false,
                });
            </script>
        ");
    }
}
