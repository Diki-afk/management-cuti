<?php

namespace App\Http\Controllers;

use App\DataTables\LeaveDataTable;
use App\Http\Requests\LeavesRequest;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LeaveDataTable $leaveDataTable)
    {
        //employee data for add relation
        $employees = Employee::all();
        return $leaveDataTable->render('pages.leaves.index',compact('employees'));
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
    public function store(LeavesRequest $request)
    {
        $data = $request->all();
        //create data
        Leave::create($data);

        return redirect()->back()->with('status', "
            <script>
                swal({
                text: 'Pegawai Cuti Berhasil Ditambahkan',
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
        $leave = Leave::find($id);
        $employees = Employee::all();
        return view('pages.leaves.edit', compact('leave', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeavesRequest $request, $id)
    {
        $data = $request->all();

        //find data
        $leave = Leave::find($id);
        //update data
        $leave->update($data);

        return redirect()->route('leaves.index')->with('status', "
            <script>
                swal({
                text: 'Cuti Berhasil Disimpan',
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
        //check data leave
        $leave = Leave::find($id);

        //delete data
        $leave->delete();

        return redirect()->back()->with('status', "
            <script>
                swal({
                text: 'Cuti Berhasil Dihapus',
                icon: 'success',
                timer: 1500,
                buttons: false,
                });
            </script>
        ");
    }
}
