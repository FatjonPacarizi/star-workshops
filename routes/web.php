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
Route::view('/about','about');
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
    //Super Admin only group routes
    Route::group(
        [
            'middleware'=>'is_superadmin',
            'as' => 'superadmin.',
        ], function(){

            // Add routes here for superadmin only
            Route::get('usersManager',[UserManageController::class,'index'])->name('showManageUsers');
            Route::get('usersManager/{id}/edit',[UserManageController::class,'edit']);
            Route::put('/usersManager/{id}',[UserManageController::class, 'update']);
            Route::delete('/usersManager/{user}', [UserManageController::class, 'destroy']);
           
        });


    //Admin only group routes
    Route::group(
        [
            'middleware'=>'is_admin',
            'as' => 'admin.',
        ], function(){

             // Add routes here for admin only
             Route::get('admin',[testController::class,'index'])->name('admin'); //this is a test route
        });


    //SuperAdmin and Admin group routes 
    Route::group(
        [
            'middleware' => ['is_admin_or_superadmin'],
            'as' => 'adminsuperadmin.',
        ], function() {
         // Add routes here for admin and superadmin 

         Route::get('/appInfos', [InformationController::class, 'index'])->name('ShowAppInfos');
         Route::put('/appInfos/{id}/edit', [InformationController::class, 'update']);
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
