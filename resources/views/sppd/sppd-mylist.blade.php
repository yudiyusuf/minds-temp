@extends('layouts.master')
@section('title') @lang('translation.Mysppd_List') @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') SPPD @endslot
@slot('title') Daftar SPPD @endslot
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
                                 <a href="{{ route('sppd.create') }}" class="btn btn-light"><i class="bx bx-plus me-1"></i>Buat SPPD Baru</a>
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
                             <th scope="col">Pekerjaan</th>
                             <th scope="col">Penerima Tugas</th>
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
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->F}}/I/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '02')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/II/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '03')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/III/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '04')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/IV/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '05')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/V/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '06')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/VI/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '07')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/VII/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '08')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/VIII/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '09')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/IX/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '10')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/X/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '11')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/XI/{{$datas->created_at->translatedFormat('y')}}</td>
                                        @elseif ($datas->created_at->translatedFormat('m') == '12')
                                            <td>{{$datas->nomor_sppd}}/CSV/{{$datas->user->divisi->dept_code}}/XII/{{$datas->created_at->translatedFormat('s')}}</td>
                                        @endif
                                            <td>{{$datas->pekerjaan}}</td>
                                            <td>{{$datas->penerimatugassatu->name}} 
                                                @if ($datas->penerima_tugas2 != '')
                                                    </br>{{$datas->penerimatugasdua->name}}
                                                @endif
                                                @if ($datas->penerima_tugas3 != '')
                                                    </br>{{$datas->penerimatugastiga->name}}
                                                @endif
                                                @if ($datas->penerima_tugas4 != '')
                                                    </br>{{$datas->penerimatugasempat->name}}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                     <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                         <i class="bx bx-dots-horizontal-rounded"></i>
                                                     </button>
                                                     <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="{{url('/sppd/preview', $datas->id )}}">Detail</a></li>
                                                        <li><a class="dropdown-item" href="{{url('/sppd/edit', $datas->id )}}">Edit</a></li>
                                                        @if ($datas->status_mengetahui == 'BELUM APPROVED')
                                                            <form method="POST" action="{{ route('sppd.delete', $datas->id) }}">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                                            </form>
                                                        @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Yakin Ingin Menghapus SPPD Ini?`,
              text: "Jika dihapus, internal SPPD tidak akan ditemukan lagi.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
@endsection
