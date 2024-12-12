@extends('layouts.master')
@section('title') @lang('translation.Mymemo_List') @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Internal Memo @endslot
@slot('title') Daftar Internal Memo @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-body">
                 <div class="row align-items-center">
                     <div class="col-md-6">
                         <div class="mb-3">
                             <h5 class="card-title">Yang Saya Buat<span class="text-muted fw-normal ms-2">({{$datacount}})</span></h5>
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                             <div>
                                 <a href="{{ route('internalmemo.request.create') }}" class="btn btn-light"><i class="bx bx-plus me-1"></i>Buat Memo Baru</a>
                             </div>
                         </div>

                     </div>
                 </div>
                 <!-- end row -->

                 <div class="table-responsive mb-4">
                     <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                         <thead>
                         <tr>
                             <th scope="col" style="width: 50px;">
                                 <div class="form-check font-size-16">
                                     <input type="checkbox" class="form-check-input" id="checkAll">
                                     <label class="form-check-label" for="checkAll"></label>
                                 </div>
                             </th>
                             <th scope="col">Nomor</th>
                             <th scope="col">Judul</th>
                             <th scope="col">Disetujui</th>
                             <th scope="col">Diketahui</th>
                             <th style="width: 80px; min-width: 80px;">Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                        @foreach ($data as $datas)
                                <tr>
                                    <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                         <label class="form-check-label" for="contacusercheck1"></label>
                                     </div>
                                    </th>   
                                        @if ($datas->created_at->translatedFormat('m') == '01')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->F}}/I/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '02')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/II/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '03')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/III/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '04')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/IV/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '05')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/V/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '06')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/VI/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '07')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/VII/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '08')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/VIII/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '09')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/IX/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '10')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/X/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '11')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/XI/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '12')
                                            <td>{{$datas->nomor_internalmemo}}/CSV/{{$datas->user->divisi->dept_code}}/XII/{{$datas->created_at->translatedFormat('s')}}</td>
                                        @endif
                                            <td>{{$datas->memoname}}</td>
                                            <td>{{$datas->mengetahui->name}}
                                                    <div class="d-flex gap-2">
                                                    @if ($datas->status_diketahui == 'APPROVED')
                                                     <a href="#" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                    @elseif ($datas->status_diketahui == 'BELUM APPROVED')
                                                    <a href="#" class="badge badge-soft-primary font-size-11">Belum Diketahui</a>
                                                    @elseif ($datas->status_diketahui == 'TIDAK APPROVED')
                                                    <a href="#" class="badge bg-soft-danger text-danger font-size-11">Tidak Diketahui</a>
                                                    @endif
                                                    </div>
                                                        @if ($datas->mengetahui2 != '')
                                                            {{$datas->mengetahui2->name}}
                                                            <div class="d-flex gap-2">
                                                            @if ($datas->status_diketahui2 == 'APPROVED')
                                                             <a href="#" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                            @elseif ($datas->status_diketahui2 == 'BELUM APPROVED')
                                                            <a href="#" class="badge badge-soft-primary font-size-11">Belum Diketahui</a>
                                                            @elseif ($datas->status_diketahui2 == 'TIDAK APPROVED')
                                                            <a href="#" class="badge bg-soft-danger text-danger font-size-11">Tidak Diketahui</a>
                                                            @endif
                                                            </div>
                                                        @endif
                                            </td>
                                            <td>{{$datas->menyetujui->name}}
                                                    <div class="d-flex gap-2">
                                                    @if ($datas->status_disetujui == 'APPROVED')
                                                     <a href="#" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                    @elseif ($datas->status_disetujui == 'BELUM APPROVED')
                                                    <a href="#" class="badge badge-soft-primary font-size-11">Belum Setuju</a>
                                                    @elseif ($datas->status_disetujui == 'TIDAK APPROVED')
                                                    <a href="#" class="badge bg-soft-danger text-danger font-size-11">Tidak Setuju</a>
                                                    @endif
                                                    </div>
                                                        @if ($datas->menyetujui2 != '')
                                                            {{$datas->menyetujui2->name}}
                                                            <div class="d-flex gap-2">
                                                            @if ($datas->status_disetujui2 == 'APPROVED')
                                                             <a href="#" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                            @elseif ($datas->status_disetujui2 == 'BELUM APPROVED')
                                                            <a href="#" class="badge badge-soft-primary font-size-11">Belum Setuju</a>
                                                            @elseif ($datas->status_disetujui2 == 'TIDAK APPROVED')
                                                            <a href="#" class="badge bg-soft-danger text-danger font-size-11">Tidak Setuju</a>
                                                            @endif
                                                            </div>
                                                        @endif
                                            </td>
                                            <td>
                                                 <div class="dropdown">
                                                     <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                         <i class="bx bx-dots-horizontal-rounded"></i>
                                                     </button>
                                                     <ul class="dropdown-menu dropdown-menu-end">
                                                         <li><a class="dropdown-item" href="{{url('/request/preview', $datas->id )}}">Detail</a></li>
                                                     </ul>
                                                 </div>
                                            </td>
                                </tr>
                        @endforeach
                         </tbody>
                     </table>
                     <!-- end table -->
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
