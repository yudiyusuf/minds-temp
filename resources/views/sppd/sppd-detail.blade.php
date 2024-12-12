@extends('layouts.mastermemodetail')
@section('title') @lang('translation.Read_sppd') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')SPPD @endslot
@slot('title')Detail SPPD @endslot
@endcomponent
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="text-center">
                            <img src="{{ URL::asset('assets/images/logocsv.png') }}" height="110px;">
                                        <h4 class="font-size-14"></h4>
                                        <h4 class="font-size-14">SURAT PERINTAH PERJALAN DINAS</h4>
                                        @if ($data->created_at->translatedFormat('m') == '01')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/I/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '02')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/II/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '03')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/III/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '04')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/IV/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '05')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/V/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '06')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/VI/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '07')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/VII/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '08')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/VIII/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '09')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/IX/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '10')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/X/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '11')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/XI/{{$data->created_at->translatedFormat('y')}}</h4>
                                        @elseif ($data->created_at->translatedFormat('m') == '12')
                                            <h4 class="font-size-14">{{$data->nomor_sppd}}/CSV/{{$data->user->divisi->dept_code}}/XII/{{$data->created_at->translatedFormat('s')}}</h4>
                                        @endif
                        </div>
                    <hr color="#000" size="3px">
                    <p>Tanggal  &nbsp;&nbsp;: {{$data->created_at->translatedFormat('l, d F Y H:i')}} </br>Sehubungan dengan adanya kegiatan perjalanan dinas maka ditugaskan kepada:</p>
                    <p></p>
                            <div class="row">
                                <div class="col-xl-4 col-6">
                                    Nama Lengkap : {{$data->penerimatugassatu->name}} </br>
                                    NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->penerimatugassatu->nik}} </br>
                                    Posisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  {{$data->penerimatugassatu->posisi}} </br>
                                    Divisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  {{$data->penerimatugassatu->divisi->name}} </br>
                                    Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->penerimatugassatu->level_id}} </br>
                                    </br>
                                </div>
                                @if ($data->penerimatugasdua != '')
                                    <div class="col-xl-4 col-6">
                                        Nama Lengkap : {{$data->penerimatugasdua->name}} </br>
                                        NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->penerimatugasdua->nik}} </br>
                                        Posisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  {{$data->penerimatugasdua->posisi}} </br>
                                        Divisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  {{$data->penerimatugasdua->divisi->name}} </br>
                                        Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->penerimatugasdua->level_id}} </br>
                                        </br>
                                    </div>
                                @endif

                                @if ($data->penerimatugastiga != '')
                                <div class="col-xl-4 col-6">
                                    Nama Lengkap : {{$data->penerimatugastiga->name}} </br>
                                    NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->penerimatugastiga->nik}} </br>
                                    Posisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  {{$data->penerimatugastiga->posisi}} </br>
                                    Divisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  {{$data->penerimatugastiga->divisi->name}} </br>
                                    Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->penerimatugastiga->level_id}} </br>
                                    </br>
                                </div>
                                @endif

                                @if ($data->penerimatugasempat != '')
                                <div class="col-xl-4 col-6">
                                    Nama Lengkap : {{$data->penerimatugasempat->name}} </br>
                                    NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->penerimatugasempat->nik}} </br>
                                    Posisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  {{$data->penerimatugastiga->posisi}} </br>
                                    Divisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  {{$data->penerimatugastiga->divisi->name}} </br>
                                    Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->penerimatugasempat->level_id}} </br>
                                    </br>
                                </div>
                                @endif
                            </div>
                    </br>
                    <p>Untuk melakukan perjalanan dinas dengan rincian sbb : </br>
                                    Pekerjaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->pekerjaan}}  </br>
                                    Tujuan Kota &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->tujuan}} </br>
                                    Tgl. Berangkat : {{$data->tgl_berangkat}} </br>
                                    Tgl. Kembali &nbsp;&nbsp;&nbsp;&nbsp; : {{$data->tgl_kembali}} </br>
                                    Transportasi &nbsp;&nbsp;&nbsp; : {{$data->transportasi}} </br>
                                    Penginapan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$data->penginapan}} </br>
                    </p>

                        <table style="border-collapse: collapse; width: 100.029%; height: 156.771px;" border="1">
                            <tbody>
                                <tr style="height: 22.3958px;">
                                <td style="width: 25.0188%; text-align: center; height: 22.3958px;"><strong><span style="background-color: #ffffff; color: #000000;">Komponen Biaya</span></strong></td>
                                <td style="width: 25.0188%; text-align: center; height: 22.3958px;"><strong><span style="background-color: #ffffff; color: #000000;">Jumlah Hari</span></strong></td>
                                <td style="width: 25.0188%; text-align: center; height: 22.3958px;"><strong><span style="background-color: #ffffff; color: #000000;">Nominal</span></strong></td>
                                <td style="width: 25.0188%; text-align: center; height: 22.3958px;"><strong><span style="background-color: #ffffff; color: #000000;">Total</span></strong></td>
                                </tr>
                                <tr style="height: 22.3958px;">
                                <td style="width: 25.0188%; height: 22.3958px;">&nbsp;<span style="background-color: #ffffff; color: #000000;">Tunjangan Luar Kota - {{$data->penerimatugassatu->name}}</span></strong></td>
                                <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">{{$data->jumlah_hari}}&nbsp;&nbsp;</span></strong></td>
                                <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">@if ($data->jumlah_hari < '8') {{ number_format($data->penerimatugassatu->nominal->uang_makan,0,',','.') }}@else 100.000 @endif &nbsp;</span></strong></td>
                                <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">{{ number_format($data->uangmakan_penerima1,0,',','.') }}&nbsp;&nbsp;</span></strong></td>
                                </tr>
                                @if ($data->penerima_tugas2 != '')
                                        <tr style="height: 22.3958px;">
                                        <td style="width: 25.0188%; height: 22.3958px;">&nbsp;<span style="background-color: #ffffff; color: #000000;">Tunjangan Luar Kota - {{$data->penerimatugasdua->name}}</span></strong></td>
                                        <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">{{$data->jumlah_hari}}&nbsp;&nbsp;</span></strong></td>
                                        <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">@if ($data->jumlah_hari < '8') {{ number_format($data->penerimatugasdua->nominal->uang_makan,0,',','.') }}@else 100.000 @endif &nbsp;</span></strong></td>
                                        <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">{{ number_format($data->uangmakan_penerima2,0,',','.') }}&nbsp;&nbsp;</span></strong></td>
                                        </tr>
                                        </tr>
                                @endif
                                @if ($data->penerima_tugas3 != '')
                                        <tr style="height: 22.3958px;">
                                        <td style="width: 25.0188%; height: 22.3958px;">&nbsp;<span style="background-color: #ffffff; color: #000000;">Tunjangan Luar Kota - {{$data->penerimatugastiga->name}}</span></strong></td>
                                        <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">{{$data->jumlah_hari}}&nbsp;&nbsp;</span></strong></td>
                                        <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">@if ($data->jumlah_hari < '8') {{ number_format($data->penerimatugastiga->nominal->uang_makan,0,',','.') }}@else 100.000 @endif &nbsp;</span></strong></td>
                                        <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">{{ number_format($data->uangmakan_penerima3,0,',','.') }}&nbsp;&nbsp;</span></strong></td>
                                        </tr>
                                        </tr>
                                @endif
                                @if ($data->penerima_tugas4 != '')
                                        <tr style="height: 22.3958px;">
                                        <td style="width: 25.0188%; height: 22.3958px;">&nbsp;<span style="background-color: #ffffff; color: #000000;">Tunjangan Luar Kota - {{$data->penerimatugasempat->name}}</span></strong></td>
                                        <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">{{$data->jumlah_hari}}&nbsp;&nbsp;</span></strong></td>
                                        <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">@if ($data->jumlah_hari < '8') {{ number_format($data->penerimatugasempat->nominal->uang_makan,0,',','.') }}@else 100.000 @endif &nbsp;</span></strong></td>
                                        <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;<span style="background-color: #ffffff; color: #000000;">{{ number_format($data->uangmakan_penerima4,0,',','.') }}&nbsp;&nbsp;</span></strong></td>
                                        </tr>
                                @endif
                                <tr style="height: 22.3958px;">
                                <td style="width: 25.0188%; height: 22.3958px;">&nbsp;<span style="background-color: #ffffff; color: #000000;">Biaya Operasional Perjalanan Dinas</span></strong></td>
                                <td style="width: 25.0188%; height: 22.3958px;">&nbsp;</td>
                                <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;{{ number_format($data->biaya_operasional,0,',','.') }}&nbsp;&nbsp;</td>
                                <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;{{ number_format($data->biaya_operasional,0,',','.') }}&nbsp;&nbsp;</td>
                                </tr>
                                <tr style="height: 22.3958px;">
                                <td style="height: 22.3958px; width: 75.0565%; text-align: center;" colspan="3"><strong>TOTAL&nbsp;</strong></td>
                                <td style="width: 25.0188%; height: 22.3958px; text-align: right;">&nbsp;{{ number_format($data->uangmakan_penerima1 + $data->uangmakan_penerima2 + $data->uangmakan_penerima3 + $data->uangmakan_penerima4 + $data->biaya_operasional  ,0,',','.') }}&nbsp;&nbsp;
                                </tr>
                            </tbody>
                        </table>

                    </br>
                    <p>Biaya akomodasi dan transportasi wajib dipertanggungjawabkan dan diperhitungkan setelah kembali maksimal H+2 hari kerja dengan melampirkan bukti kwitansi/bill/tiket yang diperoleh selama perjalanan dinas.
                    </br>
                    JIka adanya Perjalanan Dinas >7 hari, maka uang makan menjadi 100.000/hari.</p>

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
                            @if ($data->status_penerima_tugas1 == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Penerima Tugas 1</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->penerimatugassatu->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugassatu->name}}</br>{{$data->tgl_diterimatugas1}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_penerima_tugas1 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diterima Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->penerima_tugas1 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.penerimatugassatu', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugassatu->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_penerima_tugas1 == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diterima Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->penerima_tugas1 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.penerimatugassatu', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugassatu->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @if ($data->penerima_tugas2 != '')
                        <div class="col-xl-2 col-3">
                            @if ($data->status_penerima_tugas2 == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Penerima Tugas 2</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->penerimatugasdua->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugasdua->name}}</br>{{$data->tgl_diterimatugas2}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_penerima_tugas2 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diterima Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->penerima_tugas2 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.penerimatugasdua', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugasdua->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_penerima_tugas2 == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diterima Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->penerima_tugas2 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.penerimatugasdua', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugasdua->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                        @if ($data->penerima_tugas3 != '')
                        <div class="col-xl-2 col-3">
                            @if ($data->status_penerima_tugas3 == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Penerima Tugas 3</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->penerimatugastiga->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugastiga->name}}</br>{{$data->tgl_diterimatugas3}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_penerima_tugas3 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diterima Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->penerima_tugas3 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.penerimatugastiga', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugastiga->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_penerima_tugas3 == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diterima Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->penerima_tugas3 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.penerimatugastiga', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugastiga->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                        @if ($data->penerima_tugas4 != '')
                        <div class="col-xl-2 col-3">
                            @if ($data->status_penerima_tugas4 == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Penerima Tugas 4</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->penerimatugasempat->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugasempat->name}}</br>{{$data->tgl_diterimatugas4}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_penerima_tugas4 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diterima Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->penerima_tugas4 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.penerimatugasempat', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugasempat->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_penerima_tugas4 == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diterima Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->penerima_tugas4 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.penerimatugasempat', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->penerimatugasempat->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                        <div class="col-xl-2 col-3">
                            @if ($data->status_mengetahui == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Mengetahui</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->mengetahui->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->mengetahui->name}}</br>{{$data->tgl_mengetahui}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_mengetahui == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diketahui Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->mengetahui_id == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.mengetahui', $data->id) }}">
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
                            @elseif ($data->status_mengetahui == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diterima Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->mengetahui_id == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.mengetahui', $data->id) }}">
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
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-2 col-3">
                            @if ($data->status_pemberi_tugas1 == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Disetujui Oleh</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->pemberitugassatu->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugassatu->name}}</br>{{$data->tgl_pemberitugas1}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_pemberi_tugas1 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Disetujui Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->pemberi_tugas1 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.pemberitugassatu', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugassatu->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_pemberi_tugas1 == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Disetujui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                @if ($data->pemberi_tugas1 == Auth::user()->id)
                                                    <a href="{{ route('sppd.pemberitugassatu', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Disetujui</a>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugassatu->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @if ($data->pemberi_tugas2 != '')
                        <div class="col-xl-2 col-3">
                            @if ($data->status_pemberi_tugas2 == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Disetujui Oleh</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->pemberitugasdua->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugasdua->name}}</br>{{$data->tgl_pemberitugas2}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_pemberi_tugas2 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Disetujui Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->pemberi_tugas2 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.pemberitugasdua', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugasdua->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_pemberi_tugas2 == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Disetujui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                @if ($data->pemberi_tugas2 == Auth::user()->id)
                                                    <a href="{{ route('sppd.pemberitugasdua', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Disetujui</a>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugasdua->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                        @if ($data->pemberi_tugas3 != '')
                        <div class="col-xl-2 col-3">
                            @if ($data->status_pemberi_tugas3 == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Disetujui Oleh</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->pemberitugastiga->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugastiga->name}}</br>{{$data->tgl_pemberitugas3}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_pemberi_tugas3 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Disetujui Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->pemberi_tugas3 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.pemberitugastiga', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugastiga->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_pemberi_tugas3 == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Disetujui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                @if ($data->pemberi_tugas3 == Auth::user()->id)
                                                    <a href="{{ route('sppd.pemberitugastiga', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Disetujui</a>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugastiga->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                        @if ($data->pemberi_tugas4 != '')
                        <div class="col-xl-2 col-3">
                            @if ($data->status_pemberi_tugas4 == 'APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Disetujui Oleh</h4>
                                <img class="card-img-top" src="{{ URL::asset('images/'. $data->pemberitugasempat->sign) }}" alt="Card image cap" height="100px;">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugasempat->name}}</br>{{$data->tgl_pemberitugas4}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_pemberi_tugas4 == 'BELUM APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Disetujui Oleh</h4>
                                                <div class="d-flex flex-wrap gap-2">
                                                @if ($data->pemberi_tugas4 == Auth::user()->id)
                                                    <form method="POST" action="{{ route('sppd.pemberitugasempat', $data->id) }}">
                                                        @csrf
                                                        <input name="id" type="hidden" value="{{$data->id}}">
                                                        <button class="btn btn-primary w-xs" type="submit" data-toggle="tooltip" title='Diketahui'><i class="mdi mdi-thumb-up"></i></button>
                                                    </form>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugasempat->name}}</a>
                                </div>
                            </div>
                            @elseif ($data->status_pemberi_tugas4 == 'TIDAK APPROVED')
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Disetujui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                @if ($data->pemberi_tugas4 == Auth::user()->id)
                                                    <a href="{{ route('sppd.pemberitugasempat', $data->id) }}" class="badge bg-soft-success text-success font-size-11">Disetujui</a>
                                                @endif
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium">{{$data->pemberitugasempat->name}}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
            </div>
        <!-- card -->

    </div>
    <!-- end Col -->
</div>
        <footer class="col-12">
          <div class="footer-copyright">
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

