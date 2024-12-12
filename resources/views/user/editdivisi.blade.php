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
                 </div>
                 <!-- end row -->
                    <div class="card-body ">
                        <form method="POST" action="{{ route('divisi.updatedivisi') }}">
                            @csrf

                            <input id="id" value="{{ $departments->id }}" type="hidden" class="form-control" type="text" name="id" />
                            <div class="mb-3">
                                <label for="name" class="form-control-label">Nama Divisi</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" placeholder="name"
                                    value="{{ $departments->name }}" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="sect_head" class="form-control-label">Section Head</label>
                                <select name="sect_head" id="sect_head"
                                    class="custom-select form-control @error('sect_head') is-invalid @enderror">
                                    <option value="" selected>Pilih Section Head</option>
                                    @foreach ($sect_heads as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $departments->sect_head == $user->id ? "selected":"" }}>
                                        {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="dept_head" class="form-control-label">Dept Head</label>
                                <select name="dept_head" id="dept_head"
                                    class="custom-select form-control @error('dept_head') is-invalid @enderror">
                                    <option value="" selected>Pilih Dept Head</option>
                                    @foreach ($dept_heads as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $departments->dept_head == $user->id ? "selected":"" }}>
                                        {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="bod_head" class="form-control-label">Bod Head</label>
                                <select name="bod_head" id="bod_head"
                                    class="custom-select form-control @error('bod_head') is-invalid @enderror">
                                    <option value="" selected>Pilih Bod Head</option>
                                    @foreach ($bod_heads as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $departments->bod_head == $user->id ? "selected":"" }}>
                                        {{ $user->name }}</option>
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
