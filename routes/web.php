<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Common\SettingsController;


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
Route::view('/login','auth.login')->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');




Route::post('logout', function (Request $request) {
        Auth::logout();
        return redirect('/login')->with(['msg' => 'You signed out!', 'msg_type' => 'warning']);
})->name('logout');



Route::middleware(['auth', 'verified'])->prefix('admin')->group( function () {
    Route::view('/', 'admin.home')->name('admin');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings/save', [SettingsController::class, 'save'])->name('savesettings');
});