@extends('layouts.master')
@section('title') @lang('translation.Read_Internalmemo') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')Internal Memo @endslot
@slot('title')Detail Internal Memo @endslot
@endcomponent
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="flex-grow-1 text-center">
                            <img class="mx-auto d-block rounded" src="{{ URL::asset('assets/images/logocsv.png') }}" height="200px;">
                                        <h4 class="font-size-16">INTERNAL MEMO</h4>
                                        @if ($data->created_at->translatedFormat('m') == '01')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/I/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '02')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/II/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '03')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/III/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '04')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/IV/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '05')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/V/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '06')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/VI/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '07')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/VII/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '08')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/VIII/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '09')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/IX/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '10')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/X/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '11')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/XI/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '12')
                                            <h4 class="font-size-16">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/XII/{{$data->created_at->translatedFormat('s')}}</h4>
                                        @endif
                        </div>
                    <p>Subject  &nbsp; &nbsp;: {{$data->memoname}} </br>Tanggal  &nbsp;&nbsp;: {{$data->created_at->translatedFormat('l, d F Y H:i')}}</p>
                    <p></p>
                    <div class="row">
                    <p>
                    {!! $data->memodesc !!}
                    <hr/>
                    </div>

                    <div class="row">
                        <div class="col-xl-2 col-3">
                            <div class="card">
                                <h4 class="font-size-16 text-center">Dibuat Oleh</h4>
                                <img class="card-img-top img-fluid" src="{{ URL::asset('images/'. $data->user->sign) }}" alt="Card image cap">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->user->name}}</br>{{$data->created_at}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-3">
                            @if ($data->status_diketahui == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Diketahui Oleh</h4>
                                <img class="card-img-top img-fluid" src="{{ URL::asset('images/'. $data->mengetahui->sign) }}" alt="Card image cap">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->mengetahui->name}}</br>{{$data->tgl_diketahui}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_diketahui == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diketahui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                @if ($data->diketahui == Auth::user()->id)
                                                    <a href="{{ route('internalmemo.request.diketahuiapproved', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->mengetahui->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_diketahui == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Diketahui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                @if ($data->diketahui == Auth::user()->id)
                                                    <a href="{{ route('internalmemo.request.diketahuiapproved', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->mengetahui->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @if ($data->diketahui2 != '')
                        <div class="col-xl-2 col-3">
                            @if ($data->status_diketahui2 == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Diketahui Oleh</h4>
                                <img class="card-img-top img-fluid" src="{{ URL::asset('images/'. $data->mengetahui2->sign) }}" alt="Card image cap">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->mengetahui2->name}}</br>{{$data->tgl_diketahui2}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_diketahui2 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diketahui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                @if ($data->diketahui2 == Auth::user()->id)
                                                    <a href="{{ route('internalmemo.request.diketahuiapproved2', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->mengetahui2->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_diketahui2 == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Diketahui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                @if ($data->diketahui == Auth::user()->id)
                                                    <a href="{{ route('internalmemo.request.diketahuiapproved2', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->mengetahui2->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                        <div class="col-xl-2 col-3">
                            @if ($data->status_disetujui == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Disetujui Oleh</h4>
                                <img class="card-img-top img-fluid" src="{{ URL::asset('images/'. $data->menyetujui->sign) }}" alt="Card image cap">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui->name}}</br>{{$data->tgl_disetujui}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_disetujui == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge badge-soft-primary">Belum Disetujui Oleh</h4>
                                                <div class="d-flex gap-2 text-center">
                                                @if ($data->disetujui == Auth::user()->id)
                                                    <a href="{{ route('internalmemo.request.disetujuiapproved', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                    <a href="{{ route('internalmemo.request.disetujuitidakapproved', $data->id) }}" class="badge bg-soft-danger text-danger font-size-11">Tidak Setuju</a>
                                                @else
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_disetujui == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Disetujui Oleh</h4>
                                                <div class="d-flex gap-2 text-center">
                                                @if ($data->disetujui == Auth::user()->id)
                                                    <a href="{{ route('internalmemo.request.disetujuiapproved', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @if ($data->disetujui2 != '')
                        <div class="col-xl-2 col-3">
                            @if ($data->status_disetujui2 == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Disetujui Oleh</h4>
                                <img class="card-img-top img-fluid" src="{{ URL::asset('images/'. $data->menyetujui2->sign) }}" alt="Card image cap">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui2->name}}</br>{{$data->tgl_disetujui2}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_disetujui2 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge badge-soft-primary">Belum Disetujui Oleh</h4>
                                                <div class="d-flex gap-2 text-center">
                                                @if ($data->disetujui2 == Auth::user()->id)
                                                    <a href="{{ route('internalmemo.request.disetujuiapproved2', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                    <a href="{{ route('internalmemo.request.disetujuitidakapproved2', $data->id) }}" class="badge bg-soft-danger text-danger font-size-11">Tidak Setuju</a>
                                                @else
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui2->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_disetujui2 == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Disetujui Oleh</h4>
                                                <div class="d-flex gap-2 text-center">
                                                @if ($data->disetujui2 == Auth::user()->id)
                                                    <a href="{{ route('internalmemo.request.disetujuiapproved2', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui2->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                    @if ($data->jenis_internalmemo == 1)
                        <p>Jenis Internal Memo : Budget</br>Total Budget : Rp. {{ number_format($data->nominal,0,',','.') }}</br>Diinformasikan kepada : {{$data->boleh_dilihat}}</p>
                    @else
                        <p>Jenis Internal Memo : Non Budget</br>Diinformasikan Kepada : {{$data->boleh_dilihat}}</p>
                    @endif
                </div>

            </div>
        <!-- card -->

    </div>
    <!-- end Col -->

</div>
<!--         <footer class="page-footer font-small blue pt-4">
          <div class="footer-copyright text-center py-3"><a href="https://sanivokasi.com" target="_blank">PT. Cahaya Sani Vokasi</a></div>
        </footer> -->
<!-- end row -->
<!-- Modal -->
<!-- end modal -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/email-editor.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

