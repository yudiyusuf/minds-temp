
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Read_Internalmemo'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>Internal Memo <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Detail Internal Memo <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="flex-grow-1 text-center">
                            <img class="mx-auto d-block rounded" src="<?php echo e(URL::asset('assets/images/logocsv.png')); ?>" height="200px;">
                                        <h4 class="font-size-16">INTERNAL MEMO</h4>
                                        <?php if($data->created_at->translatedFormat('m') == '01'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/I/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '02'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/II/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '03'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/III/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '04'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/IV/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '05'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/V/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '06'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/VI/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '07'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/VII/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '08'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/VIII/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '09'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/IX/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '10'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/X/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '11'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/XI/<?php echo e($data->created_at->translatedFormat('y')); ?></h4>
                                        <?php elseif($data->created_at->translatedFormat('m') == '12'): ?>
                                            <h4 class="font-size-16"><?php echo e($data->nomor_internalmemo); ?>/CSV/<?php echo e($data->user->divisi->dept_code); ?>/XII/<?php echo e($data->created_at->translatedFormat('s')); ?></h4>
                                        <?php endif; ?>
                        </div>
                    <p>Subject  &nbsp; &nbsp;: <?php echo e($data->memoname); ?> </br>Tanggal  &nbsp;&nbsp;: <?php echo e($data->created_at->translatedFormat('l, d F Y H:i')); ?></p>
                    <p></p>
                    <div class="row">
                    <p>
                    <?php echo $data->memodesc; ?>

                    <hr/>
                    </div>

                    <div class="row">
                        <div class="col-xl-2 col-3">
                            <div class="card">
                                <h4 class="font-size-16 text-center">Dibuat Oleh</h4>
                                <img class="card-img-top img-fluid" src="<?php echo e(URL::asset('images/'. $data->user->sign)); ?>" alt="Card image cap">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->user->name); ?></br><?php echo e($data->created_at); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-3">
                            <?php if($data->status_diketahui == 'APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Diketahui Oleh</h4>
                                <img class="card-img-top img-fluid" src="<?php echo e(URL::asset('images/'. $data->mengetahui->sign)); ?>" alt="Card image cap">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->mengetahui->name); ?></br><?php echo e($data->tgl_diketahui); ?></a>
                                </div>
                            </div>
                            <?php elseif($data->status_diketahui == 'BELUM APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diketahui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                <?php if($data->diketahui == Auth::user()->id): ?>
                                                    <a href="<?php echo e(route('internalmemo.request.diketahuiapproved', $data->id)); ?>" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                <?php endif; ?>
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->mengetahui->name); ?></a>
                                </div>
                            </div>
                            <?php elseif($data->status_diketahui == 'TIDAK APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Diketahui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                <?php if($data->diketahui == Auth::user()->id): ?>
                                                    <a href="<?php echo e(route('internalmemo.request.diketahuiapproved', $data->id)); ?>" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                <?php endif; ?>
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->mengetahui->name); ?></a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if($data->diketahui2 != ''): ?>
                        <div class="col-xl-2 col-3">
                            <?php if($data->status_diketahui2 == 'APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Diketahui Oleh</h4>
                                <img class="card-img-top img-fluid" src="<?php echo e(URL::asset('images/'. $data->mengetahui2->sign)); ?>" alt="Card image cap">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->mengetahui2->name); ?></br><?php echo e($data->tgl_diketahui2); ?></a>
                                </div>
                            </div>
                            <?php elseif($data->status_diketahui2 == 'BELUM APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center badge-soft-primary">Belum Diketahui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                <?php if($data->diketahui2 == Auth::user()->id): ?>
                                                    <a href="<?php echo e(route('internalmemo.request.diketahuiapproved2', $data->id)); ?>" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                <?php endif; ?>
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->mengetahui2->name); ?></a>
                                </div>
                            </div>
                            <?php elseif($data->status_diketahui2 == 'TIDAK APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Diketahui Oleh</h4>
                                                <div class="d-flex gap-2">
                                                <?php if($data->diketahui == Auth::user()->id): ?>
                                                    <a href="<?php echo e(route('internalmemo.request.diketahuiapproved2', $data->id)); ?>" class="badge bg-soft-success text-success font-size-11">Diketahui</a>
                                                <?php endif; ?>
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->mengetahui2->name); ?></a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <div class="col-xl-2 col-3">
                            <?php if($data->status_disetujui == 'APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Disetujui Oleh</h4>
                                <img class="card-img-top img-fluid" src="<?php echo e(URL::asset('images/'. $data->menyetujui->sign)); ?>" alt="Card image cap">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->menyetujui->name); ?></br><?php echo e($data->tgl_disetujui); ?></a>
                                </div>
                            </div>
                            <?php elseif($data->status_disetujui == 'BELUM APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center badge badge-soft-primary">Belum Disetujui Oleh</h4>
                                                <div class="d-flex gap-2 text-center">
                                                <?php if($data->disetujui == Auth::user()->id): ?>
                                                    <a href="<?php echo e(route('internalmemo.request.disetujuiapproved', $data->id)); ?>" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                    <a href="<?php echo e(route('internalmemo.request.disetujuitidakapproved', $data->id)); ?>" class="badge bg-soft-danger text-danger font-size-11">Tidak Setuju</a>
                                                <?php else: ?>
                                                <?php endif; ?>
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->menyetujui->name); ?></a>
                                </div>
                            </div>
                            <?php elseif($data->status_disetujui == 'TIDAK APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Disetujui Oleh</h4>
                                                <div class="d-flex gap-2 text-center">
                                                <?php if($data->disetujui == Auth::user()->id): ?>
                                                    <a href="<?php echo e(route('internalmemo.request.disetujuiapproved', $data->id)); ?>" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                <?php endif; ?>
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->menyetujui->name); ?></a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if($data->disetujui2 != ''): ?>
                        <div class="col-xl-2 col-3">
                            <?php if($data->status_disetujui2 == 'APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-success">Disetujui Oleh</h4>
                                <img class="card-img-top img-fluid" src="<?php echo e(URL::asset('images/'. $data->menyetujui2->sign)); ?>" alt="Card image cap">
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->menyetujui2->name); ?></br><?php echo e($data->tgl_disetujui2); ?></a>
                                </div>
                            </div>
                            <?php elseif($data->status_disetujui2 == 'BELUM APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center badge badge-soft-primary">Belum Disetujui Oleh</h4>
                                                <div class="d-flex gap-2 text-center">
                                                <?php if($data->disetujui2 == Auth::user()->id): ?>
                                                    <a href="<?php echo e(route('internalmemo.request.disetujuiapproved2', $data->id)); ?>" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                    <a href="<?php echo e(route('internalmemo.request.disetujuitidakapproved2', $data->id)); ?>" class="badge bg-soft-danger text-danger font-size-11">Tidak Setuju</a>
                                                <?php else: ?>
                                                <?php endif; ?>
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->menyetujui2->name); ?></a>
                                </div>
                            </div>
                            <?php elseif($data->status_disetujui2 == 'TIDAK APPROVED'): ?>
                            <div class="card">
                                <h4 class="font-size-16 text-center bg-soft-danger">Tidak Disetujui Oleh</h4>
                                                <div class="d-flex gap-2 text-center">
                                                <?php if($data->disetujui2 == Auth::user()->id): ?>
                                                    <a href="<?php echo e(route('internalmemo.request.disetujuiapproved2', $data->id)); ?>" class="badge bg-soft-success text-success font-size-11">Setuju</a>
                                                <?php endif; ?>
                                                </div>
                                <div class="py-2 text-center">
                                    <a href="javascript: void(0);" class="fw-medium"><?php echo e($data->menyetujui2->name); ?></a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if($data->jenis_internalmemo == 1): ?>
                        <p>Jenis Internal Memo : Budget</br>Total Budget : Rp. <?php echo e(number_format($data->nominal,0,',','.')); ?></br>Diinformasikan kepada : <?php echo e($data->boleh_dilihat); ?></p>
                    <?php else: ?>
                        <p>Jenis Internal Memo : Non Budget</br>Diinformasikan Kepada : <?php echo e($data->boleh_dilihat); ?></p>
                    <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/@ckeditor/@ckeditor.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/email-editor.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\minds\resources\views/internalmemo/internal-memo-detail.blade.php ENDPATH**/ ?>