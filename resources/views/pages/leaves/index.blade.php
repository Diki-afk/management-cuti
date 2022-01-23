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
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                            <div>
                              <h4 class="card-title card-title-dash">Table Pegawai Cuti</h4>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-lg text-white mb-0 me-0" data-bs-toggle="modal" data-bs-target="#modalCreate" type="button">
                                    <i class="mdi mdi-account-plus"></i>Tambah karyawan Cuti
                                </button>                            
                            </div>
                          </div>
                          <div class="table-responsive  mt-1">
                            {!! $dataTable->table(['class' => 'table table-striped', 'width' => '100%']) !!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered mt-1 modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Karyawan</h5>
                    </div>
                    <form action="{{ route('leaves.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Default select</label>
                                        <select class="form-control" id="FormControlSelect2" required name="employee_id">
                                            <option disabled selected value> -- Pilih Nomor Induk Karyawan -- </option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->identification_number }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-1">
                                        <label for="leave_date" class="d-block">Tanggal Cuti</label>
                                        <input required type="date" name="leave_date" id="leave_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-1">
                                        <label for="long_leave" class="d-block">Lama Cuti</label>
                                        <input required type="number" name="long_leave" id="long_leave" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-1">
                                        <label for="description" class="d-block">Deskripsi</label>
                                        <textarea required name="description" id="description" class="form-control-plaintext px-2 border" cols="30" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary text-white">Save</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
    {{$dataTable->scripts()}}
@endpush