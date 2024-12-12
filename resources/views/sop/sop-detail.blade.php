@extends('layouts.mastermemodetail')
@section('title') @lang('translation.Read_Sop') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')SOP @endslot
@slot('title')Detail SOP @endslot
@endcomponent
<style>
.container {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding-top: 100%; /* 1:1 Aspect Ratio */
}

.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border: none;
}
</style>
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table style="border-collapse: collapse; width: 100%; height: 100px;" border="1">
                    <tbody>
                    <tr style="height: 100px;">
                        <td style="width: 48.7657%; height: 100px;">
                            <div class="text-center">
                                    <img src="{{ URL::asset('assets/images/logocsv.png') }}" height="110px;">
                            </div>
                        </td>
                        <td style="width: 48.7657%; height: 100px;">
                            <div class="text-center">
                                    <h4 class="font-size-70">{{$data->namasop}}</h4>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    </table>

                    </br>

                    <table style="border-collapse: collapse; width: 100%; height: 159.172px;" border="1">
                    <tbody>
                    <tr style="height: 22.3906px;">
                    <td style="height: 22.3906px; width: 100.075%;" colspan="3" class="text-center">&nbsp;
                                        No. SOP : @if ($data->created_at->translatedFormat('m') == '01')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/I/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '02')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/II/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '03')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/III/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '04')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/IV/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '05')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/V/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '06')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/VI/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '07')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/VII/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '08')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/VIII/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '09')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/IX/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '10')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/X/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '11')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/XI/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '12')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/XII/{{$data->created_at->translatedFormat('s')}}
                                        @endif
                    </td>
                    </tr>
                    <tr style="height: 22.3906px;">
                    <td style="width: 33.3584%; height: 22.3906px;">&nbsp;Disusun oleh :</td>
                    <td style="width: 33.3584%; height: 22.3906px;">&nbsp;Diperiksa oleh :</td>
                    <td style="width: 33.3584%; height: 22.3906px;">&nbsp;Disetujui oleh :</td>
                    </tr>
                    <tr style="height: 114.391px;">
                    <td style="width: 33.3584%; height: 114.391px;">&nbsp;
                                <img class="center" src="{{ URL::asset('images/'. $data->user->sign) }}" alt="Card image cap" height="100px;">
                                <div class="text-center">
                                    <a>{{$data->user->name}}</br>{{$data->created_at}}</a>
                                </div>
                    </td>
                    <td style="width: 33.3584%; height: 114.391px;">&nbsp;
                                    @if ($data->status_diperiksa == 'APPROVED')
                                        <img class="center" src="{{ URL::asset('images/'. $data->meriksa->sign) }}" alt="Card image cap" height="100px;">
                                        <div class="text-center">
                                            <a>{{$data->meriksa->name}}</br>{{$data->tgl_diperiksa}}</a>
                                        </div>
                                    @elseif ($data->status_diperiksa == 'BELUM APPROVED')
                                    <div class="card">
                                        <h4 class="font-size-16 text-center">Belum Diperiksa Oleh</h4>
                                                        <div class="d-flex flex-wrap gap-2">
                                                        @if ($data->diperiksa == Auth::user()->id)
                                                            <form method="POST" action="{{ route('sop.diperiksaapproved', $data->id) }}">
                                                                @csrf
                                                                <input name="id" type="hidden" value="{{$data->id}}">
                                                                <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up">Jika sudah oke dan di periksa, klik disini</i></button>
                                                            </form>
                                                        @endif
                                                        </div>
                                        <div class="py-2 text-center">
                                            <a href="javascript: void(0);" class="fw-medium">{{$data->meriksa->name}}</a>
                                        </div>
                                    </div>
                                    @elseif ($data->status_diperiksa == 'TIDAK APPROVED')
                                    <div class="card">
                                        <h4 class="font-size-16 text-center bg-soft-danger">Tidak Diperiksa Oleh</h4>
                                                        <div class="d-flex gap-2">
                                                        @if ($data->diketahui == Auth::user()->id)
                                                            <a href="{{ route('sop.diperiksaapproved', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Diperiksa</a>
                                                        @endif
                                                        </div>
                                        <div class="py-2 text-center">
                                            <a href="javascript: void(0);" class="fw-medium">{{$data->meriksa->name}}</a>
                                        </div>
                                    </div>
                                    @endif
                    </td>
                    <td style="width: 33.3584%; height: 114.391px;">&nbsp;
                                    @if ($data->status_disetujui == 'APPROVED')
                                    <div class="card">
                                        <img class="center" src="{{ URL::asset('images/'. $data->menyetujui->sign) }}" alt="Card image cap" height="100px;">
                                        <div class="text-center">
                                            <a>{{$data->menyetujui->name}}</br>{{$data->tgl_disetujui}}</a>
                                        </div>
                                    </div>
                                    @elseif ($data->status_disetujui == 'BELUM APPROVED')
                                    <div class="card">
                                        <h4 class="font-size-16 text-center">Belum Disetujui Oleh</h4>
                                                        @if ($data->disetujui == Auth::user()->id)
                                                        <div class="btn-group mb-3" role="group">
                                                            <form method="POST" action="{{ route('sop.disetujuiapproved', $data->id) }}">
                                                                @csrf
                                                                <input name="id" type="hidden" value="{{$data->id}}">
                                                                <button class="btn btn-primary w-xs" type="submit" title='Setuju'><i class="mdi mdi-thumb-up"></i></button>
                                                            </form>
                                                            <form method="POST" action="{{ route('sop.disetujuitidakapproved', $data->id) }}">
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
                                                            <form method="POST" action="{{ route('sop.disetujuiapproved', $data->id) }}">
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
                    </td>
                    </tr>
                    </tbody>
                    </table>

                    <p></p>
                    <div>
                    <p>
                    <body>
                    <h4 class="font-size-16 text-left">A. KEBIJAKAN SPESIFIK</h4>
                    <div>{!! $data->kebijakan_spesifik !!}</div>
                    </body>
                    </div>

                    <div>
                    <p>
                    <body>
                    <h4 class="font-size-16 text-left">B. TUJUAN</h4>
                    <div>{!! $data->tujuan !!}</div>
                    </body>
                    </div>

                    <div>
                    <p>
                    <body>
                    <h4 class="font-size-16 text-left">C. KETENTUAN DAN PROSES</h4>
                    <div>{!! $data->ketentuan_proses !!}</div>
                    </body>
                    </div>

                    <div>
                    <p>
                    <body>
                    <h4 class="font-size-16 text-left">D. ALUR KERJA</h4>
                    <div>
                    @foreach ($data->gambaralurkerja as $gambaralurkerjas)
                        <div class="position-relative mt-3">
                                <img src="{{ URL::asset('filesop/alurkerja/'. $gambaralurkerjas->filename) }}" alt="Card image cap" class="img-thumbnail" height="200px;">
                        </div>
                    @endforeach
                    </div>
                    </body>
                    </div>

                    <div>
                    <p>
                    <body>
                    <h4 class="font-size-16 text-left">E. DOKUMEN PENDUKUNG</h4>
                    <div>
                    @foreach ($data->dokumenpendukung as $dokumenpendukungs)
                        <div class="container">
                                <iframe class="responsive-iframe" src="{{ URL::asset('filesop/dokumenpendukung/'. $dokumenpendukungs->filename) }}"></iframe>
                        </div>
                    @endforeach
                    </div>
                    </body>
                    </div>

                    </br>
                    </br>
                    Diinformasikan Kepada : {{$data->boleh_dilihat}}</p>
                </div>

            </div>
        <!-- card -->

    </div>
    <!-- end Col -->
</div>
        <footer class="col-12">
          <div class="footer-copyright">
                <hr color="#F0552A " size="3px">Pergudangan Era Prima Blok I No.2 - Jalan Raya Daan Mogot KM.21  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                                 
                                        @if ($data->created_at->translatedFormat('m') == '01')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/I/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '02')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/II/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '03')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/III/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '04')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/IV/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '05')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/V/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '06')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/VI/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '07')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/VII/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '08')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/VIII/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '09')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/IX/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '10')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/X/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '11')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/XI/{{$data->created_at->translatedFormat('y')}}
                                        @elseif ($data->created_at->translatedFormat('m') == '12')
                                            {{$data->nomor_sop}}/CSV/{{$data->user->divisi->dept_code}}/XII/{{$data->created_at->translatedFormat('s')}}
                                        @endif
                </br>Batu Ceper - Tangerang 15122, Indonesia</div>
        </footer>
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

