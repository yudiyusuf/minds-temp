
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Minds'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<body>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-soft-light min-vh-100 py-5">
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="row justify-content-center mb-5">
                            <div class="col-sm-5">
                                <div class="maintenance-img">
                                    <img src="<?php echo e(URL::asset('assets/images/maintenance.png')); ?>" alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-4">MINDS OS</h3>
                        <p>Management Intelligence and Network Database of Sanivokasi</p>

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-microsoft font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">MDBC</h5>
                                           <p class="text-muted mb-0"><a href="https://businesscentral.dynamics.com/" target="_blank" rel="noopener noreferrer">Microsoft Dynamic Bisnis Center</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-ticket-accountc font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">
                                                Ticketing</h5>
                                            <p class="text-muted mb-0">Ticketing For CSV</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-email-outline font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">Synology</h5>
                                            <p class="text-muted mb-0"><a href="https://sanivokasi.synology.me/" target="_blank" rel="noopener noreferrer">Drive & Mail Synolgy</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-access-point-network font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">E-Ticketing</h5>
                                           <p class="text-muted mb-0"><a href="http://110.5.102.154:8000/login" target="_blank" rel="noopener noreferrer">Sales Ticketing From Pesanan</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-clock-outline font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">
                                                POS</h5>
                                            <p class="text-muted mb-0"><a href="http://54.179.58.215:8000/" target="_blank" rel="noopener noreferrer">Pos Cahaya Sani Vokasi</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-diamond font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">Parva Bisnis</h5>
                                            <p class="text-muted mb-0"><a href="https://parvabisnis.id" target="_blank" rel="noopener noreferrer">Catalog & Ecommerce Parva</a></p>
                                        </div>
                                    </div>
                                </div>
                                                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-cog-refresh-outline font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">Management Asset</h5>
                                           <p class="text-muted mb-0"><a href="#" target="_blank" rel="noopener noreferrer">Stock & Management Asset</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-book font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">
                                                Internal Memo</h5>
                                            <p class="text-muted mb-0"><a href="<?php echo e(route('internalmemo.request')); ?>" target="_blank" rel="noopener noreferrer">Memo Internal For CSV</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-md mx-auto">
                                                <span class="avatar-title bg-soft-primary rounded-circle">
                                                    <i class="mdi mdi-file-pdf font-size-24 text-primary"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15 text-uppercase mt-4">Lumin PDF</h5>
                                            <p class="text-muted mb-0"><a href="https://www.luminpdf.com/" target="_blank" rel="noopener noreferrer">PDF Sign & Approval</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
</div>
<!-- end  -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Admin\resources\views/minds.blade.php ENDPATH**/ ?>