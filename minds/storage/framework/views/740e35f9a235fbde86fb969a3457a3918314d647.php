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
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="productname">Judul Internal Memo</label>
                                <input id="productname" name="productname" type="text" class="form-control"  placeholder="Product Name">
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Jenis Internal Memo</label>
                                <select name="jenis_intenarlmemo" id="jenis_intenarlmemo" class="form-control select2">
                                    <option>Select</option>
                                    <option value="FA">Budget</option>
                                    <option value="EL">Non Budget</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input id="price" name="price" type="text" class="form-control" placeholder="Price">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Disetujui Oleh</label>
                                <select name="disetujui" id="disetujui" class="form-control select2">
                                    <option>Select</option>
                                    <option value="FA">Vitalik</option>
                                    <option value="EL">Stephanie</option>
                                    <option value="EL">Steven Beteng</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Diketahui Oleh</label>
                                <select name="diketahui" id="diketahui" class="form-control select2">
                                    <option>Select</option>
                                    <option value="FA">Vitalik</option>
                                    <option value="EL">Stephanie</option>
                                    <option value="EL">Steven Beteng</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Boleh Dilihat Oleh</label>

                                <select name="boleh_dilihat" id="boleh_dilihat" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                                    <option value="WI">Yudiana Yusuf</option>
                                    <option value="BE">Muhammad Yudha</option>
                                    <option value="BA">Sandy Pramudiana</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-12">
                                    <label for="memodesc">Memo Description</label>
                                    <textarea class="form-control" id="memodesc" rows="5" placeholder="Memo Description"></textarea>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Admin\resources\views/internal-memo-add.blade.php ENDPATH**/ ?>