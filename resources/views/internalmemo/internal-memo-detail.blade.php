@extends('layouts.mastermemodetail')
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
                        <div class="text-center">
                            <img src="{{ URL::asset('assets/images/logocsv.png') }}" height="110px;">
                                        <h4 class="font-size-14"></h4>
                                        <h4 class="font-size-14">INTERNAL MEMO</h4>
                                        @if ($data->created_at->translatedFormat('m') == '01')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/I/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '02')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/II/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '03')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/III/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '04')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/IV/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '05')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/V/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '06')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/VI/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '07')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/VII/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '08')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/VIII/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '09')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/IX/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '10')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/X/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '11')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/XI/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '12')
                                            <h4 class="font-size-14">{{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/XII/{{$data->created_at->translatedFormat('s')}}</h4>
                                        @endif
                        </div>
                    <hr color="#000" size="3px">
                    <p>Subject  &nbsp; &nbsp;: {{$data->memoname}} </br>Tanggal  &nbsp;&nbsp;: {{$data->created_at->translatedFormat('l, d F Y H:i')}}</p>
                    <p></p>
                    <div>
                    <p>
                    <body>
                    <div>{!! $data->memodesc !!}</div>
                    </body>
                    </div>
                    @if ($data->catatan_diketahui != '')
                    </br>
                    <h4 class="font-size-16 text-left">Catatan Dari Yang Mengetahui:</h4>
                    <div>{!! $data->catatan_diketahui !!}</div>
                    @endif
                    @if ($data->catatan_disetujui != '')
                    </br>
                    <h4 class="font-size-16 text-left">Catatan Dari Yang Menyetujui:</h4>
                    <div>{!! $data->catatan_disetujui !!}</div>
                    @endif
                    @if ($data->gambarmemo != '')
                    </br>
                    @foreach ($data->gambarmemo as $gambarmemos)
                        <p>Lampiran Gambar</p>
                        <div class="position-relative mt-3">
                                <img src="{{ URL::asset('filememo/images/'. $gambarmemos->filename) }}" alt="Card image cap" class="img-thumbnail" height="200px;">
                        </div>
                        @endforeach
                    @endif
                    </br>
                    </br>

                    <div class="row">
                        <div class="col-xl-2 col-3">
                            <div class="card">
                                <h4 class="font-size-16 text-center">Dibuat Oleh</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->user->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->user->name}}</br>{{$data->created_at}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-3">
                            @if ($data->status_diketahui == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Diketahui Oleh</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->mengetahui->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->mengetahui->name}}</br>{{$data->tgl_diketahui}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_diketahui == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diketahui Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->diketahui == Auth::user()->id)
                                                    <form method="POST" action="{{ route('internalmemo.request.diketahuiapproved', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
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
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->mengetahui2->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->mengetahui2->name}}</br>{{$data->tgl_diketahui2}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_diketahui2 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diketahui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                @if ($data->diketahui2 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('internalmemo.request.diketahuiapproved2', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
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


                                @if ($data->status_diketahui2 == 'APPROVED' && $data->status_diketahui == 'APPROVED')
                                        <div class="col-xl-2 col-3">
                                            @if ($data->status_disetujui == 'APPROVED')
                                            <div class="card">
                                                <h4 class="font-size-16 text-center bg-soft-success">Disetujui Oleh</h4>
                                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->menyetujui->sign) }}" alt="Card image cap" height="100px;">
                                                <div class="py-2 text-center">
                                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui->name}}</br>{{$data->tgl_disetujui}}</a>
                                                </div>
                                            </div>
                                            @elseif ($data->status_disetujui == 'BELUM APPROVED')
                                            <div class="card">
                                                <h4 class="font-size-16 text-center badge badge-soft-primary">Belum Disetujui Oleh</h4>
                                                                @if ($data->disetujui == Auth::user()->id)
                                                                <div class="btn-group" role="group">
                                                                    <form method="POST" action="{{ route('internalmemo.request.disetujuiapproved', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-primary w-xs" type="submit" title='Setuju'><i class="mdi mdi-thumb-up"></i></button>
                                                                    </form>
                                                                    <form method="POST" action="{{ route('internalmemo.request.disetujuitidakapproved', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-danger w-xs" type="submit" title='Tidak Setuju'><i class="mdi mdi-thumb-down"></i></button>
                                                                    </form>
                                                                </div>
                                                                @else
                                                                @endif
                                                <div class="py-2 text-center">
                                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui->name}}</a>
                                                </div>
                                            </div>
                                            @elseif ($data->status_disetujui == 'TIDAK APPROVED')
                                            <div class="card">
                                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Disetujui Oleh</h4>
                                                                <div class="d-flex gap-2 text-center">
                                                                @if ($data->disetujui == Auth::user()->id)
                                                                    <form method="POST" action="{{ route('internalmemo.request.disetujuiapproved', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-primary w-xs" type="submit" title='Setuju'><i class="mdi mdi-thumb-up"></i></button>
                                                                    </form>
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
                                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->menyetujui2->sign) }}" alt="Card image cap" height="100px;">
                                                <div class="py-2 text-center">
                                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui2->name}}</br>{{$data->tgl_disetujui2}}</a>
                                                </div>
                                            </div>
                                            @elseif ($data->status_disetujui2 == 'BELUM APPROVED')
                                            <div class="card">
                                                <h4 class="font-size-16 text-center badge badge-soft-primary">Belum Disetujui Oleh</h4>
                                                                <div class="d-flex gap-2 text-center">
                                                                @if ($data->disetujui2 == Auth::user()->id)
                                                               <div class="btn-group mb-3" role="group">
                                                                    <form method="POST" action="{{ route('internalmemo.request.disetujuiapproved2', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-primary w-xs" type="submit" title='Setuju'><i class="mdi mdi-thumb-up"></i></button>
                                                                    </form>
                                                                    <form method="POST" action="{{ route('internalmemo.request.disetujuitidakapproved2', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-danger w-xs" type="submit" title='Tidak Setuju'><i class="mdi mdi-thumb-down"></i></button>
                                                                    </form>
                                                                </div>
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
                                                                     <form method="POST" action="{{ route('internalmemo.request.disetujuiapproved2', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-primary w-xs" type="submit" title='Setuju'><i class="mdi mdi-thumb-up"></i></button>
                                                                    </form>
                                                                @endif
                                                                </div>
                                                <div class="py-2 text-center">
                                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui2->name}}</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                @elseif ($data->status_diketahui == 'APPROVED' && $data->diketahui2 == '')
                                        <div class="col-xl-2 col-3">
                                            @if ($data->status_disetujui == 'APPROVED')
                                            <div class="card">
                                                <h4 class="font-size-16 text-center bg-soft-success">Disetujui Oleh</h4>
                                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->menyetujui->sign) }}" alt="Card image cap" height="100px;">
                                                <div class="py-2 text-center">
                                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui->name}}</br>{{$data->tgl_disetujui}}</a>
                                                </div>
                                            </div>
                                            @elseif ($data->status_disetujui == 'BELUM APPROVED')
                                            <div class="card">
                                                <h4 class="font-size-16 text-center badge badge-soft-primary">Belum Disetujui Oleh</h4>
                                                                @if ($data->disetujui == Auth::user()->id)
                                                                <div class="btn-group" role="group">
                                                                    <form method="POST" action="{{ route('internalmemo.request.disetujuiapproved', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-primary w-xs" type="submit" title='Setuju'><i class="mdi mdi-thumb-up"></i></button>
                                                                    </form>
                                                                    <form method="POST" action="{{ route('internalmemo.request.disetujuitidakapproved', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-danger w-xs" type="submit" title='Tidak Setuju'><i class="mdi mdi-thumb-down"></i></button>
                                                                    </form>
                                                                </div>
                                                                @else
                                                                @endif
                                                <div class="py-2 text-center">
                                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui->name}}</a>
                                                </div>
                                            </div>
                                            @elseif ($data->status_disetujui == 'TIDAK APPROVED')
                                            <div class="card">
                                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Disetujui Oleh</h4>
                                                                <div class="d-flex gap-2 text-center">
                                                                @if ($data->disetujui == Auth::user()->id)
                                                                    <form method="POST" action="{{ route('internalmemo.request.disetujuiapproved', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-primary w-xs" type="submit" title='Setuju'><i class="mdi mdi-thumb-up"></i></button>
                                                                    </form>
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
                                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->menyetujui2->sign) }}" alt="Card image cap" height="100px;">
                                                <div class="py-2 text-center">
                                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui2->name}}</br>{{$data->tgl_disetujui2}}</a>
                                                </div>
                                            </div>
                                            @elseif ($data->status_disetujui2 == 'BELUM APPROVED')
                                            <div class="card">
                                                <h4 class="font-size-16 text-center badge badge-soft-primary">Belum Disetujui Oleh</h4>
                                                                <div class="d-flex gap-2 text-center">
                                                                @if ($data->disetujui2 == Auth::user()->id)
                                                               <div class="btn-group mb-3" role="group">
                                                                    <form method="POST" action="{{ route('internalmemo.request.disetujuiapproved2', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-primary w-xs" type="submit" title='Setuju'><i class="mdi mdi-thumb-up"></i></button>
                                                                    </form>
                                                                    <form method="POST" action="{{ route('internalmemo.request.disetujuitidakapproved2', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-danger w-xs" type="submit" title='Tidak Setuju'><i class="mdi mdi-thumb-down"></i></button>
                                                                    </form>
                                                                </div>
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
                                                                     <form method="POST" action="{{ route('internalmemo.request.disetujuiapproved2', $data->id) }}">
                                                                        @csrf
                                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                                        <button class="btn btn-primary w-xs" type="submit" title='Setuju'><i class="mdi mdi-thumb-up"></i></button>
                                                                    </form>
                                                                @endif
                                                                </div>
                                                <div class="py-2 text-center">
                                                    <a href="javascript: void(0);" class="fw-medium">{{$data->menyetujui2->name}}</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                @else
                                        <div class="col-xl-2 col-3">
                                            <div class="card">
                                                <h4 class="font-size-16 text-center bg-soft-success">Belum Bisa Di Setujui</h4>
                                                <a href="javascript: void(0);" class="fw-medium">Baru bisa disetujui jika sudah di ketahui</a>
                                        </div>
                                @endif



                    </div>
                    @if ($data->jenis_internalmemo == 1)
                        <p>Jenis Internal Memo : Budget</br>Total Budget : Rp. {{ number_format($data->nominal,0,',','.') }}</br>Diinformasikan kepada : {{$data->boleh_dilihat}}</p>
                    @else
                        <p>Jenis Internal Memo : Non Budget</br>Diinformasikan Kepada : {{$data->boleh_dilihat}}</p>
                    @endif
                    <div class="card-body">
                        @if ($data->status_disetujui == 'BELUM APPROVED')
                            @if ($data->disetujui == Auth::user()->id)
                                <form method="POST" action="{{ route('internalmemo.request.updatedisetujui')}}">
                                    @csrf      
                                        <div class="py-2 text-center">
                                                   <h4 class="font-size-16 text-center">Tambahkan Catatan (Remarks Menyetujui)</h4>
                                        </div>
                                        <input name="id" type="hidden" value="{{$data->id}}">
                                        <div class="col-sm-12">
                                            <div class="mb-12">
                                                   <textarea class="form-control" id="catatan_disetujui" name="catatan_disetujui" rows="5" placeholder="Isi jika ada catatan untuk yang membuat memo">{{$data->catatan_disetujui}}</textarea>
                                            </div>
                                        </div>
                                    <div class="col-sm-12">
                                        <div class="mb-12">
                                                <label for="spasi"></label>
                                        </div>
                                    </div>
                                       <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                </form>
                            @endif
                        @endif
                    </div>
                    <div class="card-body">
                        @if ($data->status_diketahui == 'BELUM APPROVED')
                            @if ($data->diketahui == Auth::user()->id)
                                <form method="POST" action="{{ route('internalmemo.request.updatediketahui')}}">
                                    @csrf      
                                        <div class="py-2 text-center">
                                                   <h4 class="font-size-16 text-center">Tambahkan Catatan (Remarks Mengetahui)</h4>
                                        </div>
                                        <input name="id" type="hidden" value="{{$data->id}}">
                                        <div class="col-sm-12">
                                            <div class="mb-12">
                                                   <textarea class="form-control" id="catatan_diketahui" name="catatan_diketahui" rows="5" placeholder="Isi jika ada catatan untuk yang membuat memo">{{$data->catatan_diketahui}}</textarea>
                                            </div>
                                        </div>
                                    <div class="col-sm-12">
                                        <div class="mb-12">
                                                <label for="spasi"></label>
                                        </div>
                                    </div>
                                       <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>

            </div>
        <!-- card -->

    </div>
    <!-- end Col -->
</div>
<!--         <footer class="col-12">
          <div class="footer-copyright">
                <hr color="#F0552A " size="3px">Pergudangan Era Prima Blok I No.2 - Jalan Raya Daan Mogot KM.21  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                                 
                                        @if ($data->created_at->translatedFormat('m') == '01')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/I/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '02')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/II/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '03')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/III/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '04')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/IV/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '05')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/V/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '06')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/VI/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '07')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/VII/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '08')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/VIII/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '09')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/IX/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '10')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/X/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '11')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/XI/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '12')
                                            {{$data->nomor_internalmemo}}/CSV/{{$data->user->divisi->dept_code}}/XII/{{$data->created_at->translatedFormat('s')}}
                                        @endif
                </br>Batu Ceper - Tangerang 15122, Indonesia</div>
        </footer> -->
<!-- end row -->
<!-- Modal -->
<!-- end modal -->
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/task-create.init.js') }}"></script>
</script>
@endsection

