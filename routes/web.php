<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Common\SettingsController;
use App\Http\Controllers\Common\PagesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/verification', [AuthController::class, 'verificationNotice'])->name('verification.notice')->middleware('auth');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/admin')->with(['msg' => 'Thanks for registration', 'msg_type' => 'success']);
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware(['AllowedRegistration'])->group( function () {
    Route::view('/register','auth.register')->name('register');
    Route::post('/user/register',[AuthController::class, 'register'])->name('register.user');
});


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::middleware(['auth', 'verified', 'CanAccessDashboard'])->prefix('admin')->group( function () {
    // Dashboard
    Route::view('/', 'admin.home')->name('admin');
    // Settings
    Route::get('/settings/{type}', [SettingsController::class, 'index'])->name('settings')->middleware('role:accessSettings');
    Route::post('/settings/save', [SettingsController::class, 'save'])->name('settings.save')->middleware('role:accessSettings');
    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('role:viewUsers');
    Route::get('/users/get', [UserController::class, 'getUsers'])->name('users.get')->middleware('role:viewUsers');
    Route::get('/users/add', [UserController::class, 'addUsers'])->name('users.add')->middleware('role:addUsers');
    Route::post('/users/store', [UserController::class, 'storeUser'])->name('users.store')->middleware('role:addUsers');    
    Route::get('/users/{user:id}/edit', [UserController::class, 'editUsers'])->name('users.edit')->middleware('role:updateUsers');
    Route::post('/users/update', [UserController::class, 'updateUsers'])->name('users.update')->middleware('role:updateUsers');
    Route::get('/users/{id}/delete', [UserController::class, 'deleteuser'])->name('users.delete')->middleware('role:deleteUsers');
    // Roles
    Route::get('/roles', [RoleController::class, 'index'])->name('roles')->middleware('role:viewRoles');
    Route::get('/roles/get', [RoleController::class, 'getRoles'])->name('roles.get')->middleware('role:viewRoles');
    Route::get('/roles/add', [RoleController::class, 'create'])->name('roles.add')->middleware('role:addRoles');
    Route::post('/roles/add', [RoleController::class, 'store'])->name('roles.store')->middleware('role:addRoles');
    Route::get('/roles/{id}/edit/', [RoleController::class, 'edit'])->name('roles.edit')->middleware('role:updateRoles');
    Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update')->middleware('role:updateRoles');
    Route::get('/roles/{id}/delete', [RoleController::class, 'destroy'])->name('roles.delete')->middleware('role:deleteRoles');
    // Pages
    Route::get('/pages', [PagesController::class, 'index'])->name('pages');
    Route::get('/pages/get', [PagesController::class, 'getPages'])->name('pages.get');
    Route::get('/pages/add', [PagesController::class, 'create'])->name('pages.add');
    Route::post('/pages/add', [PagesController::class, 'store'])->name('pages.store');
    Route::get('/pages/{pages:id}/edit/', [PagesController::class, 'edit'])->name('pages.edit');
    Route::post('/pages/{pages:id}/update/', [PagesController::class, 'update'])->name('pages.update');
    Route::get('/pages/{pages:id}/delete', [PagesController::class, 'destroy'])->name('pages.delete');
});


Route::get('/{slug}', [PagesController::class, 'index'])->name('pages.front');
