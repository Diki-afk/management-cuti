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
                              <h4 class="card-title card-title-dash">Table Karyawan</h4>
                            </div>
                            <div>
                              <button class="btn btn-primary btn-lg text-white mb-0 me-0" data-bs-toggle="modal" data-bs-target="#modalCreate" type="button">
                                  <i class="mdi mdi-account-plus"></i>Tambah Karyawan
                              </button>
                            </div>
                          </div>
                          <div class="container mt-3">
                            <div class="row">
                              <form action="/employees" method="GET" class="form-inline">
                                <div class="form-group">
                                  <div class="mr-2 mb-1"> Filter Jumlah Cuti yang Diambil </div>
                                  <select class="form-control" name="operator">
                                    <option {{Request::get('operator') == null ? "selected" : ""}} value=""> Semua Data Karyawan </option>
                                    <option {{Request::get('operator') == ">" ? "selected" : ""}} value=">"> Karyawan Cuti Diambil Lebih dari 1 </option>
                                    <option {{Request::get('operator') == ">=" ? "selected" : ""}} value=">="> Karyawan Pernah Mengambil Cuti </option>
                                    <option {{Request::get('operator') == "=" ? "selected" : ""}} value="="> Karyawan Ambil Cuti 1 kali </option>
                                    <option {{Request::get('operator') == "<" ? "selected" : ""}} value="<"> Karyawan Belum Mengambil </option>
                                  </select>
                                  <button type="submit" class="btn btn-lg btn-primary text-white mt-2 px-4"> Apply </button>
                                </div>
                              </form>
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
                        <form action="{{ route('employees.store') }}" method="POST">
                                @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mt-1">
                                            <label for="identification_number" class="d-block">Nomor Induk</label>
                                            <input required type="text" name="identification_number" id="identification_number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-1">
                                            <label for="name" class="d-block">Nama</label>
                                            <input required type="text" name="name" id="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-1">
                                            <label for="date_of_birth" class="d-block">Tanggal Lahir</label>
                                            <input required type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-1">
                                            <label for="join_date" class="d-block">Tanggal Bergabung</label>
                                            <input required type="date" name="join_date" id="join_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mt-1">
                                            <label for="address" class="d-block">Alamat</label>
                                            <textarea required name="address" id="address" class="form-control-plaintext px-2 border" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary text-white">Save</button>
                            </div>
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