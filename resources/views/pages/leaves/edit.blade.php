@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
              <div class="row">
                <div class="col-lg-12 d-flex flex-column">
                  <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                          <div class="card-title">
                            <h4 class="mt-4 mx-3">Edit Data Cuti Karyawan</h4>
                          </div>
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                            <form action="{{ route('leaves.update', $leave->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Default select</label>
                                            <select class="form-control" id="FormControlSelect2" required name="employee_id">
                                                <option disabled selected value> -- Pilih Nomor Induk Karyawan -- </option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}" {{$leave->employee_id == $employee->id ? "selected" : ""}}>{{ $employee->identification_number }}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-1">
                                            <label for="leave_date" class="d-block">Tanggal Cuti</label>
                                            <input required type="date" name="leave_date" value="{{ $leave->leave_date }}" id="leave_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-1">
                                            <label for="long_leave" class="d-block">Lama Cuti</label>
                                            <input required type="number" name="long_leave" value="{{ $leave->long_leave }}" id="long_leave" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mt-1">
                                            <label for="description" class="d-block">Keterangan</label>
                                            <textarea required name="description" id="description" class="form-control-plaintext px-2 border" cols="30" rows="4">{{ $leave->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('leaves.index') }}" type="button" class="btn btn-secondary btn-lg px-4">Back</a>
                                <button type="submit" class="btn btn-lg px-4 btn-primary text-white">Save</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection