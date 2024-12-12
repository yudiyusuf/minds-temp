<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Internalmemo\UserDashboardController;
use App\Http\Controllers\Internalmemo\RequestController;

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
        Route::get('/{id}/disetujuiapproved',[RequestController::class,'disetujuiapproved'])->name('internalmemo.request.disetujuiapproved');
        Route::get('/{id}/disetujuitidakapproved',[RequestController::class,'disetujuitidakapproved'])->name('internalmemo.request.disetujuitidakapproved');
        Route::get('/{id}/diketahuiapproved',[RequestController::class,'diketahuiapproved'])->name('internalmemo.request.diketahuiapproved');
        Route::get('/{id}/diketahuitidakapproved',[RequestController::class,'diketahuitidakapproved'])->name('internalmemo.request.diketahuitidakapproved');
        Route::get('/{id}/disetujuiapproved2',[RequestController::class,'disetujuiapproved2'])->name('internalmemo.request.disetujuiapproved2');
        Route::get('/{id}/disetujuitidakapproved2',[RequestController::class,'disetujuitidakapproved2'])->name('internalmemo.request.disetujuitidakapproved2');
        Route::get('/{id}/diketahuiapproved2',[RequestController::class,'diketahuiapproved2'])->name('internalmemo.request.diketahuiapproved2');
        Route::get('/{id}/diketahuitidakapproved2',[RequestController::class,'diketahuitidakapproved2'])->name('internalmemo.request.diketahuitidakapproved2');
        Route::get('/mylistmenyetujui', [RequestController::class, 'mylistmenyetujui'])
        ->name('internalmemo.mylistmenyetujui');
        Route::get('/mylistmengetahui', [RequestController::class, 'mylistmengetahui'])
        ->name('internalmemo.mylistmengetahui');
        Route::get('/mylistforme', [RequestController::class, 'mylistforme'])
        ->name('internalmemo.mylistforme');

        //user
        Route::get('/user', [UserController::class, 'index'])
        ->name('user.list');
        Route::get('/user/create', [UserController::class, 'create'])
        ->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])
        ->name('user.store');
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

