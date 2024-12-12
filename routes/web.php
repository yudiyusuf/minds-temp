<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Internalmemo\UserDashboardController;
use App\Http\Controllers\Internalmemo\RequestController;
use App\Http\Controllers\Sop\SopController;
use App\Http\Controllers\Sppd\SppdController;

use App\Http\Controllers\Technician\TechnicianDashboardController;
use App\Http\Controllers\Technician\FollowedUpRequestController;
use App\Http\Controllers\Technician\BreakTypeController;
use App\Http\Controllers\Technician\ComputerController;
use App\Http\Controllers\Technician\DepartmentController;
use App\Http\Controllers\Technician\UserController;

use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\VerifiedRequestController;
use App\Http\Controllers\Manager\TechnicianController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
//Language Translation
// Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');



Route::prefix('/')
    ->get('/', [HomeController::class, 'root'])
    ->middleware(['auth', 'which.home'])
    ->name('root');

Route::prefix('/')
    ->middleware(['auth', 'is.user'])
    ->group(function(){
        Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
        Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

        Route::post('/tambah-dashboard', [App\Http\Controllers\HomeController::class, 'tambahdashboard'])->name('tambahdashboard');
        Route::post('/delete-dashboard/{id}', [App\Http\Controllers\HomeController::class, 'deletedashboard'])->name('deletedashboard');

        Route::post('/update-passworduser/{id}', [App\Http\Controllers\UserController::class, 'updatePassworduser'])->name('updatePassworduser');
        Route::get('/user/{id}/edit', 'UserController@update')->name('user.update');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        //request
        Route::get('/request', [RequestController::class, 'index'])
        ->name('internalmemo.request');
        Route::get('/request/create', [RequestController::class, 'create'])
        ->name('internalmemo.request.create');
        Route::post('/request/store', [RequestController::class, 'store'])
        ->name('internalmemo.request.store');
        Route::get('/request/print/{id}', [RequestController::class, 'printPreview'])
        ->name('internalmemo.request.print');
        Route::get('/request/preview/{id}', [RequestController::class, 'preview'])
        ->name('internalmemo.request.preview');
        Route::get('/mylistmenyetujui', [RequestController::class, 'mylistmenyetujui'])
        ->name('internalmemo.mylistmenyetujui');
        Route::get('/mylistmengetahui', [RequestController::class, 'mylistmengetahui'])
        ->name('internalmemo.mylistmengetahui');
        Route::get('/mylistforme', [RequestController::class, 'mylistforme'])
        ->name('internalmemo.mylistforme');
        Route::delete('request/delete/{id}', [RequestController::class, 'delete'])->name('request.delete');
        Route::get('/request/edit/{id}', [RequestController::class, 'edit'])->name('internalmemo.request.edit');

        //approval
        Route::post('/disetujuiapproved/{id}',[RequestController::class,'disetujuiapproved'])->name('internalmemo.request.disetujuiapproved');
        Route::post('/disetujuitidakapproved/{id}',[RequestController::class,'disetujuitidakapproved'])->name('internalmemo.request.disetujuitidakapproved');
        Route::post('/diketahuiapproved/{id}',[RequestController::class,'diketahuiapproved'])->name('internalmemo.request.diketahuiapproved');
        Route::post('/diketahuitidakapproved/{id}',[RequestController::class,'diketahuitidakapproved'])->name('internalmemo.request.diketahuitidakapproved');
        Route::post('/{id}/diketahuitidakapproved2',[RequestController::class,'disetujuiapproved2'])->name('internalmemo.request.disetujuiapproved2');
        Route::post('/disetujuitidakapproved2/{id}',[RequestController::class,'disetujuitidakapproved2'])->name('internalmemo.request.disetujuitidakapproved2');
        Route::post('/diketahuiapproved2/{id}',[RequestController::class,'diketahuiapproved2'])->name('internalmemo.request.diketahuiapproved2');
        Route::post('/diketahuitidakapproved2/{id}',[RequestController::class,'diketahuitidakapproved2'])->name('internalmemo.request.diketahuitidakapproved2');

        Route::post('/request/updatedisetujui',[RequestController::class,'updatedisetujui'])->name('internalmemo.request.updatedisetujui');
        Route::post('/request/updatediketahui',[RequestController::class,'updatediketahui'])->name('internalmemo.request.updatediketahui');


        //requestsop
        Route::get('/sop/request', [SopController::class, 'index'])
        ->name('sop.request');
        Route::get('/sop/create', [SopController::class, 'create'])
        ->name('sop.create');
        Route::post('/sop/store', [SopController::class, 'store'])
        ->name('sop.store');
        Route::get('/sop/print/{id}', [SopController::class, 'printPreview'])
        ->name('sop.print');
        Route::get('/sop/preview/{id}', [SopController::class, 'preview'])
        ->name('sop.preview');
        Route::get('/sop/mylistmenyetujui', [SopController::class, 'mylistmenyetujui'])
        ->name('sop.mylistmenyetujui');
        Route::get('/sop/mylistdiperiksa', [SopController::class, 'mylistdiperiksa'])
        ->name('sop.mylistdiperiksa');
        Route::get('/sop/mylistforme', [SopController::class, 'mylistforme'])
        ->name('sop.mylistforme');
        Route::delete('sop/delete/{id}', [SopController::class, 'delete'])->name('sop.delete');
        Route::get('/sop/edit/{id}', [SopController::class, 'edit'])->name('sop.edit');

        Route::post('/sop/disetujuiapproved/{id}',[SopController::class,'disetujuiapproved'])->name('sop.disetujuiapproved');
        Route::post('/sop/disetujuitidakapproved/{id}',[SopController::class,'disetujuitidakapproved'])->name('sop.disetujuitidakapproved');
        Route::post('/sop/diperiksaapproved/{id}',[SopController::class,'diperiksaapproved'])->name('sop.diperiksaapproved');
        Route::post('/sop/diperiksatidakapproved/{id}',[SopController::class,'diperiksatidakapproved'])->name('sop.diperiksatidakapproved');



        //routesppd
        Route::get('/sppd/request', [SppdController::class, 'index'])
        ->name('sppd.request');
        Route::get('/sppd/create', [SppdController::class, 'create'])
        ->name('sppd.create');
        Route::post('/sppd/store', [SppdController::class, 'store'])
        ->name('sppd.store');
        Route::get('/sppd/print/{id}', [SppdController::class, 'printPreview'])
        ->name('sppd.print');
        Route::get('/sppd/preview/{id}', [SppdController::class, 'preview'])
        ->name('sppd.preview');
        Route::get('/sppd/mylistmenyetujui', [SppdController::class, 'mylistmenyetujui'])
        ->name('sppd.mylistmenyetujui');
        Route::get('/sppd/mylistmengetahui', [SppdController::class, 'mylistmengetahui'])
        ->name('sppd.mylistmengetahui');
        Route::get('/sppd/mylistforme', [SppdController::class, 'mylistforme'])
        ->name('sppd.mylistforme');
        Route::delete('/sppd/delete/{id}', [SppdController::class, 'delete'])->name('sppd.delete');
        Route::get('/sppd/edit/{id}', [SppdController::class, 'edit'])->name('sppd.request.edit');

        Route::post('/sppd/penerimatugassatu/{id}',[SppdController::class,'penerimatugassatu'])->name('sppd.penerimatugassatu');
        Route::post('/sppd/penerimatugasdua/{id}',[SppdController::class,'penerimatugasdua'])->name('sppd.penerimatugasdua');
        Route::post('/sppd/penerimatugastiga/{id}',[SppdController::class,'penerimatugastiga'])->name('sppd.penerimatugastiga');
        Route::post('/sppd/penerimatugasempat/{id}',[SppdController::class,'penerimatugasempat'])->name('sppd.penerimatugasempat');

        Route::post('/sppd/pemberitugassatu/{id}',[SppdController::class,'pemberitugassatu'])->name('sppd.pemberitugassatu');
        Route::post('/sppd/pemberitugasdua/{id}',[SppdController::class,'pemberitugasdua'])->name('sppd.pemberitugasdua');
        Route::post('/sppd/pemberitugastiga/{id}',[SppdController::class,'pemberitugastiga'])->name('sppd.pemberitugastiga');
        Route::post('/sppd/pemberitugasempat/{id}',[SppdController::class,'pemberitugasempat'])->name('sppd.pemberitugasempat');

        Route::post('/sppd/mengetahui/{id}',[SppdController::class,'mengetahui'])->name('sppd.mengetahui');

        Route::get('/sppd/penerima', [SppdController::class, 'penerima'])->name('sppd.penerima');
        Route::get('/sppd/pemberi', [SppdController::class, 'pemberi'])->name('sppd.pemberi');
        Route::get('/sppd/mylistforme', [SppdController::class, 'mylistforme'])->name('sppd.mylistforme');
        Route::get('/sppd/diketahui', [SppdController::class, 'diketahui'])->name('sppd.diketahui');

        //user
        Route::get('/user', [UserController::class, 'index'])
        ->name('user.list');
        Route::get('/user/create', [UserController::class, 'create'])
        ->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])
        ->name('user.store');
        Route::get('/listdivisi', [UserController::class, 'listdivisi'])
        ->name('user.listdivisi');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/updatename',[UserController::class,'updatename'])->name('user.updatename');
        Route::get('/divisi/editdivisi/{id}', [UserController::class, 'editdivisi'])->name('divisi.editdivisi');
        Route::post('/divisi/updatedivisi',[UserController::class,'updatedivisi'])->name('divisi.updatedivisi');

    });

Route::prefix('t')
    ->middleware(['auth', 'is.technician'])
    ->group(function(){
        Route::get('/', [TechnicianDashboardController::class, 'index'])
        ->name('technician.dashboard');
        Route::get('/json', [TechnicianDashboardController::class, 'json'])
        ->name('technician.dashboard.json');

        Route::get('/f-up-request', [FollowedUpRequestController::class, 'index'])
        ->name('technician.f-up-request');
        Route::get('/f-up-request/json', [FollowedUpRequestController::class, 'json'])
        ->name('technician.f-up-request.json');
        Route::get('/f-up-request/show/{id}', [FollowedUpRequestController::class, 'show'])
        ->name('technician.f-up-request.show');
        Route::get('/f-up-request/edit/{id}', [FollowedUpRequestController::class, 'edit'])
        ->name('technician.f-up-request.edit');
        Route::put('/f-up-request/update/{id}', [FollowedUpRequestController::class, 'update'])
        ->name('technician.f-up-request.update');

        Route::get('/computer/json', [ComputerController::class, 'json'])
        ->name('computer.json');

        // Route::get('/user/json', [UserController::class, 'json'])
        // ->name('user.json');

        // Route::resources([
        //     'break-type'    => BreakTypeController::class,
        //     'computer'      => ComputerController::class,
        //     'department'    => DepartmentController::class,
        //     'user'          => UserController::class
        // ]);
    });

Route::prefix('m')
    ->middleware(['auth', 'is.manager'])
    ->group(function(){
        Route::get('/', [ManagerDashboardController::class, 'index'])
        ->name('manager.dashboard');
        Route::get('/verified-request', [VerifiedRequestController::class, 'index'])
        ->name('manager.verified-request');
        Route::get('/verified-request/json', [VerifiedRequestController::class, 'json'])
        ->name('manager.verified-request.json');
        Route::put('/verified-request/verify/{id}', [VerifiedRequestController::class, 'verify'])
        ->name('manager.verified-request.verify');
        Route::get('/technician/json', [TechnicianController::class, 'json'])
        ->name('technician.json');

        Route::resources([
            'technician'    => TechnicianController::class
        ]);
    });

