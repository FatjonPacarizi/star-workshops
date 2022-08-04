<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Controller;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\SuperAdmin\TestController;
use App\Http\Controllers\SuperAdmin\UserManageController;

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
})->name('home');

Route::get('/landing',[LandingController::class,'index'])->name('landing');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => 'auth'],function(){
    //Super Admin group routes
    Route::group(
        [
            'middleware'=>'is_superadmin',
            'as' => 'superadmin.',
        ], function(){

            // Add routes here for superadmin
            Route::get('usersManager',[UserManageController::class,'index'])->name('showManageUsers');
            Route::get('usersManager/{id}/edit',[UserManageController::class,'edit']);
            Route::put('/usersManager/{id}',[UserManageController::class, 'update']);
            Route::delete('/usersManager/{user}', [UserManageController::class, 'destroy']);
            Route::get('/appInfos1', [InformationController::class, 'index'])->name('ShowAppInfos');
            Route::put('/appInfos1/{id}/edit', [InformationController::class, 'update']);
        });


    //Admin group routes
    Route::group(
        [
            'middleware'=>'is_admin',
            'as' => 'admin.',
        ], function(){

             // Add routes here for admin
             Route::get('admin',[testController::class,'index'])->name('admin'); //this is a test route
             Route::get('/appInfos2', [InformationController::class, 'index'])->name('ShowAppInfos');
        });

    //Users group routes
    Route::group(
        [
            'as'=>'user.',
        ],function(){
             // Add routes here for users
            Route::get('users', [Controller::class,'index'])->name('users');//this is a test route
     });
});
