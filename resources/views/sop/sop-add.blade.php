@extends('layouts.master')
@section('title') @lang('translation.Add_Sop') @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') SOP @endslot
@slot('title') Buat SOP @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Information</h4>
                <p class="card-title-desc">Fill all information below</p>
            </div>
            <div class="card-body">
                <form id="createForm" method="POST" action="{{ route('sop.store') }}" enctype="multipart/form-data">
                    @csrf                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-10">
                                <label for="namasop">Judul SOP</label>
                                <input id="namasop" name="namasop" type="text" class="form-control"  placeholder="Judul SOP" value="{{ old('namasop') }}" required>
                                <label for="namasop"></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Diperiksa Oleh</label>
                                <select name="diperiksa" id="diperiksa" class="form-control select2" required>
                                    <option value="" selected>Diperiksa Oleh</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('diperiksa') == $user->id ? "selected":"" }}>
                                        {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Disetujui Oleh</label>
                                <select name="disetujui" id="disetujui" class="form-control select2" required>
                                    <option value="" selected>Disetujui Oleh</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('disetujui') == $user->id ? "selected":"" }}>
                                        {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                                <label class="control-label">Boleh Dilihat Oleh</label>
                            <div class="mb-12">
                                <select name="boleh_dilihat[]" id="boleh_dilihat" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." required>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->name }}"
                                        {{ old('boleh_dilihat') == $user->name ? "selected":"" }}>
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
                        <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="col-form-label col-lg-2">A. Kebijakan Spesifik</label>
                                    <textarea id="ckeditor-classic2" name="kebijakan_spesifik">{{ old('kebijakan_spesifik') }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="spasi"></label>
                            </div>
                        </div>
                       <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="col-form-label col-lg-2">B. Tujuan</label>
                                    <textarea id="ckeditor-classic" name="tujuan">{{ old('kebijakan_spesifik') }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="spasi"></label>
                            </div>
                        </div>
                       <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="col-form-label col-lg-2">C. Ketentuan dan Proses</label>
                                    <textarea id="taskdesc-editor" name="ketentuan_proses">{{ old('ketentuan_proses') }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="spasi"></label>
                            </div>
                        </div>
                       <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="col-form-label col-lg-2">D. Alur Kerja</label>
                            </div>
                                <div class="col-sm-12">
                                    <div class="mb-12">
                                        <label class="form-label" for="inputImage">Upload Gambar (Max : 2 MB)</label>
                                        <input 
                                            type="file" 
                                            name="alurkerja[]" 
                                            id="alurkerja"
                                            multiple 
                                            class="form-control @error('images') is-invalid @enderror">
                                    </div>
                                </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="spasi"></label>
                            </div>
                        </div>
                       <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="col-form-label col-lg-2">E. Dokument Pendukung</label>
                            </div>

                                <div class="col-sm-12">
                                    <div class="mb-12">
                                        <label class="form-label" for="inputImage">Upload File (Max : 2 MB)</label>
                                        <input 
                                            type="file" 
                                            name="images[]" 
                                            id="inputImage"
                                            multiple 
                                            class="form-control @error('images') is-invalid @enderror">
                                    </div>
                                </div>
                        </div>
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
<script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>

<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/task-create.init.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#ckeditor-classic2' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#ckeditor-classic1' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

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