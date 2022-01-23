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
                            <h4 class="mt-4 mx-3">Edit Data Karyawan</h4>
                          </div>
                        <div class="card-body">
                          <div class="d-sm-flex justify-content-between align-items-start">
                            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mt-1">
                                                <label for="identification_number" class="d-block">Nomor Induk</label>
                                                <input type="text" value="{{ $employee->identification_number }}" name="identification_number" id="identification_number" class="form-control">
                                                <input type="hidden" name="id" id="id">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mt-1">
                                                <label for="name" class="d-block">Nama</label>
                                                <input type="text" value="{{ $employee->name }}" name="name" id="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mt-1">
                                                <label for="date_of_birth" class="d-block">Tanggal Lahir</label>
                                                <input type="date" value="{{ $employee->date_of_birth }}" name="date_of_birth" id="date_of_birth" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mt-1">
                                                <label for="join_date" class="d-block">Tanggal Bergabung</label>
                                                <input type="date" value="{{ $employee->join_date }}" name="join_date" id="join_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mt-1">
                                                <label for="address" class="d-block">Alamat</label>
                                                <textarea name="address" id="address" class="form-control-plaintext px-2 border" cols="30" rows="4">{{ $employee->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('employees.index') }}" type="button" class="btn btn-secondary btn-lg px-4">Back</a>
                                    <button type="submit" class="btn btn-primary btn-lg px-4 text-white">Save</button>
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