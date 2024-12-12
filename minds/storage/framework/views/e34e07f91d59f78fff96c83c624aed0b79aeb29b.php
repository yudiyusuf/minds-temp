
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Mymemo_List'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('/assets/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Internal Memo <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Daftar Internal Memo <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="card-body">
                 <div class="row align-items-center">
                     <div class="col-md-6">
                         <div class="mb-3">
                             <h5 class="card-title">Untuk Disetujui<span class="text-muted fw-normal ms-2">(<?php echo e($datacount); ?>)</span></h5>
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                             <div>
                                 <a href="<?php echo e(route('internalmemo.request.create')); ?>" class="btn btn-light"><i class="bx bx-plus me-1"></i>Buat Memo Baru</a>
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
                             <th scope="col">Judul</th>
                             <th scope="col">Disetujui</th>
                             <th scope="col">Diketahui</th>
                             <th style="width: 80px; min-width: 80px;">Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row">
                                     <div class="form-check font-size-16">
                                         <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                         <label class="form-check-label" for="contacusercheck1"></label>
                                     </div>
                                    </th>
                                        <?php if($datas->created_at->translatedFormat('m') == '01'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/I/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '02'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/II/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '03'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/III/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '04'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/IV/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '05'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/V/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '06'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/VI/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '07'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/VII/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '08'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/VIII/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '09'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/IX/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '10'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/X/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '11'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/XI/<?php echo e($datas->created_at->translatedFormat('y')); ?></td>
                                        <?php elseif($datas->created_at->translatedFormat('m') == '12'): ?>
                                            <td><?php echo e($datas->nomor_internalmemo); ?>/CSV/<?php echo e($datas->user->divisi->name); ?>/XII/<?php echo e($datas->created_at->translatedFormat('s')); ?></td>
                                        <?php endif; ?>
                                            <td><?php echo e($datas->memoname); ?></td>
                                            <td><?php echo e($datas->menyetujui->name); ?>

                                                    <div class="d-flex gap-2">
                                                    <?php if($datas->status_disetujui == 'APPROVED'): ?>
                                                     <a href="#" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                    <?php elseif($datas->status_disetujui == 'BELUM APPROVED'): ?>
                                                    <a href="#" class="badge badge-soft-primary font-size-11">Belum Setuju</a>
                                                    <?php elseif($datas->status_disetujui == 'TIDAK APPROVED'): ?>
                                                    <a href="#" class="badge bg-soft-danger text-danger font-size-11">Tidak Setuju</a>
                                                    <?php endif; ?>
                                                    </div>
                                            </td>
                                            <td><?php echo e($datas->mengetahui->name); ?>

                                                    <div class="d-flex gap-2">
                                                    <?php if($datas->status_diketahui == 'APPROVED'): ?>
                                                     <a href="#" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                    <?php elseif($datas->status_diketahui == 'BELUM APPROVED'): ?>
                                                    <a href="#" class="badge badge-soft-primary font-size-11">Belum Diketahui</a>
                                                    <?php elseif($datas->status_diketahui == 'TIDAK APPROVED'): ?>
                                                    <a href="#" class="badge bg-soft-danger text-danger font-size-11">Tidak Diketahui</a>
                                                    <?php endif; ?>
                                                    </div>
                                            </td>
                                            <td>
                                                 <div class="dropdown">
                                                     <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                         <i class="bx bx-dots-horizontal-rounded"></i>
                                                     </button>
                                                     <ul class="dropdown-menu dropdown-menu-end">
                                                         <li><a class="dropdown-item" href="<?php echo e(url('/request/preview', $datas->id )); ?>">Detail</a></li>
                                                     </ul>
                                                 </div>
                                            </td>
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </tbody>
                     </table>
                     <!-- end table -->
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Admin\resources\views/internalmemo/internal-memo-mylistmenyetujui.blade.php ENDPATH**/ ?>