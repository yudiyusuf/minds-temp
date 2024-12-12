<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.User_List'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('/assets/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> User <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Tambah User <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-body">
                 <div class="row align-items-center">
                     <div class="col-md-6">
                         <div class="mb-3">
                             <h5 class="card-title">Tambah User<span class="text-muted fw-normal ms-2"></span></h5>
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                             <div>
                                 <ul class="nav nav-pills">
                                     <li class="nav-item">
                                         <a class="nav-link active" href="apps-contacts-list" data-bs-toggle="tooltip" data-bs-placement="top" title="List"><i class="bx bx-list-ul"></i></a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" href="apps-contacts-grid" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid"><i class="bx bx-grid-alt"></i></a>
                                     </li>
                                 </ul>
                             </div>
                             <div>
                                 <a href="#" class="btn btn-light"><i class="bx bx-plus me-1"></i> Add New</a>
                             </div>

                             <div class="dropdown">
                                 <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     <i class="bx bx-dots-horizontal-rounded"></i>
                                 </a>

                                 <ul class="dropdown-menu dropdown-menu-end">
                                     <li><a class="dropdown-item" href="#">Action</a></li>
                                     <li><a class="dropdown-item" href="#">Another action</a></li>
                                     <li><a class="dropdown-item" href="#">Something else here</a></li>
                                 </ul>
                             </div>
                         </div>

                     </div>
                 </div>
                 <!-- end row -->
                    <div class="card-body ">
                        <form method="POST" action="<?php echo e(route('user.store')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <label for="username" class="form-control-label">Username</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="username" id="username" placeholder="Username"
                                    value="<?php echo e(old('username')); ?>" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-control-label">Nama Lengkap</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                    id="name" placeholder="Nama Lengkap" value="<?php echo e(old('name')); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="example-email-input" class="form-label">Email</label>
                                <input class="form-control" type="email" value=""<?php echo e(old('name')); ?>"" id="email" name="email" placeholder="email@example.com">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-control-label">Password</label>
                                <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    name="password" id="password" placeholder="Password" 
                                    value="">
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-control-label">Confirm Password</label>
                                <input type="password" class="form-control <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    name="confirm_password" id="confirm_password" placeholder="Confirm Password" 
                                    value="">
                            </div>

                            <div class="mb-3">
                                <label class="control-label">Posisi</label>
                                <select class="form-control select2">
                                    <option>Posisi</option>
                                    <option value="1">BOD</option>
                                    <option value="2">Executive Head</option>
                                    <option value="3">Dept Head</option>
                                    <option value="4">Section Head</option>
                                    <option value="5">Officer</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="dept_id" class="form-control-label">Divisi</label>
                                <select name="dept_id" id="dept_id"
                                    class="custom-select form-control <?php $__errorArgs = ['dept_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="" selected>Pilih Divisi</option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($department->id); ?>"
                                        <?php echo e(old('id') == $department->id ? "selected":""); ?>>
                                        <?php echo e($department->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <input type="hidden" class="form-control <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="role"
                                    id="role" placeholder="" value="USER" readonly>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                 <!-- end table responsive -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/datatables.net/datatables.net.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js')); ?>"></script> --}}
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/datatable-pages.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\minds\resources\views/user/create.blade.php ENDPATH**/ ?>