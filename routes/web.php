<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\User\Controller;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\WorkshopController;
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

Route::get('abouts', [AboutController::class, 'index']);
Route::view('/about','about');
Route::view('/workshop','workshop');
Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/',[LandingController::class,'index'])->name('landing');
Route::get('/workshop/{id}',[WorkshopController::class,'show'])->name('single-workshop');

Route::get('/workshops',[WorkshopController::class,'index'])->name('workshops');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.app');
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
            Route::get('abouts', [AboutController::class, 'index'])->name('showabouts');
            Route::get('add-about', [AboutController::class, 'create']);
            Route::post('add-about', [AboutController::class, 'store']);
            Route::get('edit-about/{id}', [AboutController::class, 'edit']);
            Route::put('update-about/{id}', [AboutController::class, 'update']);
           
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

         //Show insert workshop page
         Route::get('/workshopManage/insert',[WorkshopController::class,'create'])->name('showInsert');

        //Insert workshop 
         Route::post('/workshopManage',[WorkshopController::class,'store'])->name('storeWorkshop');

         //Show workshops page
         Route::get('/workshopManage',[WorkshopController::class,'showWorkshopManage'])->name('showManageWorkshops');
        
         //Show update workshop
         Route::get('workshopManage/{id}/edit',[WorkshopController::class,'edit']);

         //Update a workshop
         Route::put('workshopManage/{id}',[WorkshopController::class,'update']);

         //Delete a workshop
         Route::delete('/workshopManage/{workshop}', [WorkshopController::class, 'destroy']);
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