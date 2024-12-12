@extends('layouts.master')
@section('title') @lang('translation.Add_Internalmemo') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Internal Memo @endslot
@slot('title') Add Internal Memo @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Information</h4>
                <p class="card-title-desc">Fill all information below</p>
            </div>
            <div class="card-body">
                <form id="createForm" method="POST" action="{{ route('sppd.store') }}" enctype="multipart/form-data">
                    @csrf                    
                    <div class="row">
                        <input id="id" value="{{ $data->id }}" class="form-control" type="hidden" type="text" name="id" />
                        <div class="col-sm-12">
                            <div class="mb-10">
                                <label for="pekerjaan">Judul Pekerjaan</label>
                                <input id="pekerjaan" name="pekerjaan" type="text" class="form-control"  placeholder="Judul Pekerjaan" value="{{ $data->pekerjaan }}" required>
                                <label for="pekerjaan"></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nominal">Tujuan Kota</label>
                                <input id="tujuan" name="tujuan" type="text" class="form-control" placeholder="Tujuan Kota" value="{{ $data->tujuan }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Jenis Transportasi</label>
                                <select name="transportasi" id="transportasi" class="form-control select2" required>
                                    <option value="">Pilih</option>
                                    <option value="Mobil" {{ $data->transportasi == "Mobil" ? "selected":"" }}>Mobil</option>
                                    <option value="Kereta" {{ $data->transportasi == "Kereta" ? "selected":"" }}>Kereta</option>
                                    <option value="Pesawat" {{ $data->transportasi == "Pesawat" ? "selected":"" }}>Pesawat</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Penerima Tugas 1</label>
                                <select name="penerima_tugas1" id="penerima_tugas1" class="form-control select2" required>
                                    <option value="" selected>Penerima Tugas 1</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $data->penerima_tugas1 == $user->id ? "selected":"" }}>
                                        {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Penerima Tugas 3</label>
                                <select name="penerima_tugas3" id="penerima_tugas3" class="form-control select2">
                                    <option value="" selected>Penerima Tugas 3</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $data->penerima_tugas3 == $user->id ? "selected":"" }}>
                                        {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Biaya Operasional</label>
                                <input id="id" value="{{ $data->biaya_operasional }}" class="form-control" type="text" name="biayaoperasional" />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Tanggal Berangkat dan Kembali</label>
                                    <div class="input-daterange input-group" data-provide="datepicker">
                                        <input type="text" class="form-control" placeholder="Tanggal Berangkat" name="start" value="{{ $data->tgl_berangkat }}"/>
                                        <input type="text" class="form-control" placeholder="Tanggal Kembali" name="end" value="{{ $data->tgl_kembali }}"/>
                                    </div>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Jenis Penginapan</label>
                                <select name="penginapan" id="penginapan" class="form-control select2" required>
                                    <option value="">Pilih</option>
                                    <option value="Hotel" {{ $data->penginapan == "Hotel" ? "selected":"" }}>Hotel</option>
                                    <option value="Villa" {{ $data->penginapan == "Villa" ? "selected":"" }}>Villa</option>
                                    <option value="Rumah" {{ $data->penginapan == "Rumah" ? "selected":"" }}>Rumah</option>
                                    <option value="Tidak Menginap" {{ $data->penginapan == "Tidak Menginap" ? "selected":"" }}>Tidak Menginap</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Penerima Tugas 2</label>
                                <select name="penerima_tugas2" id="penerima_tugas2" class="form-control select2">
                                    <option value="" selected>Penerima Tugas 2</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $data->penerima_tugas2 == $user->id ? "selected":"" }}>
                                        {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Penerima Tugas 4</label>
                                <select name="penerima_tugas4" id="penerima_tugas4" class="form-control select2">
                                    <option value="" selected>Penerima Tugas 4</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $data->penerima_tugas4 == $user->id ? "selected":"" }}>
                                        {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                                <label class="control-label">Boleh Dilihat Oleh <br> Mohon Masukan Ulang Nama-namanya : {{$data->boleh_dilihat}}</label>
                            <div class="mb-12">
                                <select name="boleh_dilihat[]" id="boleh_dilihat" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." required>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->name }}"
                                        {{ (in_array($user->name, $boleh_dilihat))? "selected":"" }}>
                                        {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="spasi"></label>
                            </div>
                        </div>
<!--                         <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="col-form-label col-lg-2">Memo Description</label>
                                    <textarea id="taskdesc-editor" name="memodesc">{{ old('memodesc') }}"</textarea>
                            </div>
                        </div> -->
                        <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="spasi"></label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/task-create.init.js') }}"></script>

<script type="text/javascript">
        
        var nominalrupiah = document.getElementById('nominalrupiah');
        var nominal = document.getElementById('nominal');
        nominalrupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            nominalrupiah.value = formatRupiah(this.value, 'Rp. ');
            nominal.value = formatInteger(this.value, '');
        });
 
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function formatInteger(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '' : '';
                rupiah += separator + ribuan.join('');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
        }
    </script>
@endsection