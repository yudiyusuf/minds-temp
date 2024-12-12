@extends('layouts.master')
@section('title') @lang('translation.User_List') @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') User @endslot
@slot('title') Tambah User @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-body">
                 <div class="row align-items-center">
                     <div class="col-md-6">
                         <div class="mb-3">
                             <h5 class="card-title">Edit User<span class="text-muted fw-normal ms-2"></span></h5>
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                             <div>
                                 <a href="#" class="btn btn-light"><i class="bx bx-plus me-1"></i> Add New</a>
                             </div>

                             <div class="dropdown">
                                 <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     <i class="bx bx-dots-horizontal-rounded"></i>
                                 </a>

                                 <ul class="dropdown-menu dropdown-menu-end">
                                     <li><a class="dropdown-item" href="#">Action</a></li>
                                     <li><a class="dropdown-item" href="#">Another action</a></li>
                                     <li><a class="dropdown-item" href="#">Something else here</a></li>
                                 </ul>
                             </div>
                         </div>

                     </div>
                 </div>
                 <!-- end row -->
                    <div class="card-body ">
                        <form method="POST" action="{{ route('user.updatename') }}">
                            @csrf

                            <input id="id" value="{{ $item->id }}" class="form-control" type="text" name="id" />
                            <div class="mb-3">
                                <label for="username" class="form-control-label">User Name</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" id="username" placeholder="Username"
                                    value="{{ $item->name }}" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-control-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" placeholder="Nama Lengkap" value="{{ $item->username }}">
                            </div>

                            <div class="mb-3">
                                <label for="example-email-input" class="form-label">NIK</label>
                                <input class="form-control" type="number" value="{{ $item->nik }}" id="nik" name="nik" placeholder="111114444">
                            </div>

                            <div class="mb-3">
                                <label for="example-email-input" class="form-label">Email</label>
                                <input class="form-control" type="email" value="{{ $item->email }}" id="email" name="email" placeholder="email@example.com">
                            </div>

                            <div class="mb-3">
                                <label for="example-email-input" class="form-label">Posisi</label>
                                <input class="form-control" type="text" value="{{ $item->posisi }}" id="posisi" name="posisi" placeholder="HRD">
                            </div>


                            <div class="mb-3">
                                <label class="control-label">Level</label>
                                <select name="level_id" id="level_id" class="form-control select2">
                                    <option>Posisi</option>
                                    <option value="BOD" {{ $item->level_id == "BOD" ? "selected":"" }}>BOD</option>
                                    <option value="Executive Head" {{ $item->level_id == "Executive Head" ? "selected":"" }}>Executive Head</option>
                                    <option value="Dept Head" {{ $item->level_id == "Dept Head" ? "selected":"" }}>Dept Head</option>
                                    <option value="Section Head" {{ $item->level_id == "Section Head" ? "selected":"" }}>Section Head</option>
                                    <option value="Officer" {{ $item->level_id == "Officer" ? "selected":"" }}>Officer</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="dept_id" class="form-control-label">Divisi</label>
                                <select name="dept_id" id="dept_id"
                                    class="custom-select form-control @error('dept_id') is-invalid @enderror">
                                    <option value="" selected>Pilih Divisi</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ $item->dept_id == $department->id ? "selected":"" }}>
                                        {{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nominal_id" class="form-control-label">Level SPPD</label>
                                <select name="nominal_id" id="nominal_id"
                                    class="custom-select form-control @error('nominal_id') is-invalid @enderror" required>
                                    <option value="" selected>Pilih Level SPPD</option>
                                    @foreach ($nominals as $nominal)
                                    <option value="{{ $nominal->id }}"
                                        {{ $item->nominal_id == $nominal->id ? "selected":"" }}>
                                        {{ $nominal->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control @error('role') is-invalid @enderror" name="role"
                                    id="role" placeholder="" value="USER" readonly>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                 <!-- end table responsive -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/datatables.net/datatables.net.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script> --}}
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/datatable-pages.init.js') }}"></script>
@endsection
