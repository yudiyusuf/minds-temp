<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Add_Internalmemo'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/select2/select2.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Internal Memo <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Add Internal Memo <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Information</h4>
                <p class="card-title-desc">Fill all information below</p>
            </div>
            <div class="card-body">
                <form id="createForm" method="POST" action="<?php echo e(route('internalmemo.request.store')); ?>">
                    <?php echo csrf_field(); ?>                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-10">
                                <label for="memoname">Judul Internal Memo</label>
                                <input id="memoname" name="memoname" type="text" class="form-control"  placeholder="Judul Internal Memo" required>
                                <label for="memoname"></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nominal">Total Budget</label>
                                <input id="nominalrupiah" name="nominalrupiah" type="text" class="form-control" placeholder="Masukan 0 jika tidak ada Budget" required>
                                <input id="nominal" type="hidden" class="form-control" type="text" name="nominal" />
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Disetujui Oleh</label>
                                <select name="disetujui" id="disetujui" class="form-control select2" required>
                                    <option value="" selected>Disetujui Oleh</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"
                                        <?php echo e(old("id") == $user->name ? "selected":""); ?>>
                                        <?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Diketahui Oleh</label>
                                <select name="diketahui" id="diketahui" class="form-control select2" required>
                                    <option value="" selected>Diketahui Oleh</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"
                                        <?php echo e(old("id") == $user->name ? "selected":""); ?>>
                                        <?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Jenis Internal Memo</label>
                                <select name="jenis_internalmemo" id="jenis_internalmemo" class="form-control select2" required>
                                    <option value="">Pilih</option>
                                    <option value="1">Budget</option>
                                    <option value="2">Non Budget</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Disetujui Oleh</label>
                                <select name="disetujui2" id="disetujui2" class="form-control select2">
                                    <option value="" selected>Disetujui Oleh</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"
                                        <?php echo e(old("id") == $user->name ? "selected":""); ?>>
                                        <?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Diketahui Oleh</label>
                                <select name="diketahui2" id="diketahui2" class="form-control select2">
                                    <option value="" selected>Diketahui Oleh</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"
                                        <?php echo e(old("id") == $user->name ? "selected":""); ?>>
                                        <?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-7">
                                <label class="control-label">Boleh Dilihat Oleh</label>
                            <div class="mb-3">
                                <select name="boleh_dilihat[]" id="boleh_dilihat" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." required>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->name); ?>"
                                        <?php echo e(old("id") == $user->name ? "selected":""); ?>>
                                        <?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="memodesc">Memo Description</label>
                                    <textarea class="memodesc form-control" name="memodesc" id="memodesc" rows="5" placeholder="Memo Description" required></textarea>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/select2/select2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/ecommerce-select2.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('memodesc');
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\minds\resources\views/internalmemo/internal-memo-add.blade.php ENDPATH**/ ?>