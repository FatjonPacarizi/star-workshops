<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\User\Controller;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\SuperAdmin\TestController;
use App\Http\Controllers\SuperAdmin\UserManageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsPageController;
use App\Http\Controllers\usersController;


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


Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::get('abouts', [AboutController::class, 'contact']);
Route::get('/about', [AboutController::class, 'index']);

Route::view('/workshop', 'workshop');
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/members', [WorkshopController::class, 'showMembers']);

Route::get('/test', [usersController::class, 'getUsersByStaffPosition']);
Route::get('/newspage', [NewsPageController::class, 'index']);

Route::get('contact', [ContactController::class, 'index']);
Route::post('send', [ContactController::class, 'send'])->name('emailsend');

Route::get('/',[LandingController::class,'index'])->name('landing');
Route::get('landings', [LandingController::class, 'landing']);
Route::get('/workshop/{id}',[WorkshopController::class,'show'])->name('single-workshop');

Route::get('/workshops',[WorkshopController::class,'index'])->name('workshops');

Route::post('/send',[App\Http\Controllers\MailController::class, 'send'])->name('emailsend');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
});

Route::group(['middleware' => 'auth'], function () {
    //Super Admin only group routes
    Route::group(
        [
            'middleware' => 'is_superadmin',
            'as' => 'superadmin.',
        ],
        function () {

            // Add routes here for superadmin only
            Route::get('usersManager', [UserManageController::class, 'index'])->name('showManageUsers');
            Route::get('usersManager/{id}/edit', [UserManageController::class, 'edit']);
            Route::put('/usersManager/{id}', [UserManageController::class, 'update']);
            Route::delete('/usersManager/{user}', [UserManageController::class, 'destroy']);
            //Show dashboard abouts
            Route::get('abouts', [AboutController::class, 'abouts'])->name('showabouts');
            // Insert about
            Route::get('add-about', [AboutController::class, 'create']);
            Route::post('add-about', [AboutController::class, 'store']);
            //Edit about
            Route::get('edit-about/{id}', [AboutController::class, 'edit']);
            Route::put('update-about/{id}', [AboutController::class, 'update']);
            
            Route::get('landings', [LandingController::class, 'landing'])->name('showlandings');
            Route::get('add-landing', [LandingController::class, 'create']);
            Route::post('add-landing', [LandingController::class, 'store']);
            Route::get('edit-landing/{id}', [LandingController::class, 'edit']);
            Route::put('update-landing/{id}', [LandingController::class, 'update']);
            Route::get('newspages', [NewsPageController::class, 'newspage'])->name('shownewspages');
            Route::get('add-newspage', [NewsPageController::class, 'create']);
            Route::post('add-newspage', [NewsPageController::class, 'store']);
            Route::get('edit-newspage/{id}', [NewsPageController::class, 'edit']);
            Route::put('update-newspage/{id}', [NewsPageController::class, 'update']);
            Route::delete('delete-newspage/{id}', [NewsPageController::class, 'destroy']);


            //Show app infos edit
            Route::get('/appInfos', [InformationController::class, 'index'])->name('ShowAppInfos');

            //Edit app Infos
            Route::put('/appInfos/{id}/edit', [InformationController::class, 'update']);
        }
    );


    //Admin only group routes
    Route::group(
        [
            'middleware' => 'is_admin',
            'as' => 'admin.',
        ],
        function () {

            // Add routes here for admin only
            Route::get('admin', [testController::class, 'index'])->name('admin'); //this is a test route
        }
    );


    //SuperAdmin and Admin group routes
    Route::group(
        [
            'middleware' => ['is_admin_or_superadmin'],
            'as' => 'adminsuperadmin.',
        ],
        function () {
            // Add routes here for admin and superadmin

            //Show dashboard
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');

            //Show insert workshop page
            Route::get('/workshopManage/insert', [WorkshopController::class, 'create'])->name('showInsert');

            //Insert workshop
            Route::post('/workshopManage', [WorkshopController::class, 'store'])->name('storeWorkshop');

            //Show workshops page
            Route::get('/workshopManage', [WorkshopController::class, 'showWorkshopManage'])->name('showManageWorkshops');

         //Show update workshop
         Route::get('workshopManage/{id}/edit',[WorkshopController::class,'edit']);

            //Update a workshop
            Route::put('workshopManage/{id}', [WorkshopController::class, 'update']);

         //Delete a workshop
         Route::delete('/workshopManage/{workshop}', [WorkshopController::class, 'destroy']);
         Route::delete('/forcedelete/{id}',[WorkshopController::class,'forceDelete']);

         //Restore a workshop
         Route::post('/workshopManage/{id}/restore',[WorkshopController::class,'restore'])->name('workshop.restore');

        //Show workshop participants
        Route::get('/participants/{workshopid}', [WorkshopController::class, 'showParticipants'])->name('showParticipants');
        

        //Approve participant
        Route::put('/participants/{workshopid}/{participantID}/edit', [WorkshopController::class, 'approveParticipant'])->name('approveParticipant');
      
        //Decline workshop Participant
        Route::put('/participants/{workshopid}/{participantID}', [WorkshopController::class, 'declineParticipant'])->name('declineParticipant');

         
        //Delete workshop Participant
        Route::delete('/participants/{workshopid}/{participantID}', [WorkshopController::class, 'deleteParticipant'])->name('deleteParticipant');

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
