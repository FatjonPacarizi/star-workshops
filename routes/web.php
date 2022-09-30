<?php

use App\Events\MessageEvent;
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
use App\Http\Controllers\FaqController;
use App\Http\Controllers\WorkshopUsersController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\StreamingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\chatController;

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
Route::view('/userprofile', 'userprofile');
Route::view('/workshop', 'workshop');
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/chat', [chatController::class, 'index']);
Route::get('/chat/send', [chatController::class, 'send'])->name('send');

Route::get('/members', [WorkshopController::class, 'showMembers']);

Route::get('/test', [usersController::class, 'getUsersByStaffPosition']);
Route::get('/newspage', [NewsPageController::class, 'index']);
Route::get('/newspage/{id}', [NewsPageController::class, 'show'])->name('single-news');

Route::get('contact', [ContactController::class, 'index']);
Route::post('send', [ContactController::class, 'send'])->name('emailsend');

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('landings', [LandingController::class, 'landing']);
Route::get('/workshops/{id}/join', [WorkshopController::class, 'join'])->name('workshop-join');
Route::get('/workshop/{workshop}', [WorkshopController::class, 'show'])->name('single-workshop');

Route::get('/streaming/{id}',[StreamingController::class,'index'])->name('streaming');
Route::get('/workshops', [WorkshopController::class, 'index'])->name('workshops');

Route::post('/send', [App\Http\Controllers\MailController::class, 'send'])->name('emailsend');

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
            Route::get('users/manage', [UserManageController::class, 'index'])->name('showManageUsers');
            Route::get('users/manage/{id}/edit', [UserManageController::class, 'edit']);
            Route::put('/users/manage/{id}', [UserManageController::class, 'update']);
            Route::delete('/users/manage/{user}', [UserManageController::class, 'destroy']);
            //Show dashboard abouts
            Route::get('aboutus', [AboutController::class, 'abouts'])->name('showabouts');
            // Insert about
            Route::get('add-about', [AboutController::class, 'create']);
            Route::post('add-about', [AboutController::class, 'store']);
            //Edit about
            Route::get('edit-about/{id}', [AboutController::class, 'edit']);
            Route::put('update-about/{id}', [AboutController::class, 'update'])->name('aboutUpdate');

            Route::get('landingpage', [LandingController::class, 'landing'])->name('showlandings');
            Route::get('add-landing', [LandingController::class, 'create']);
            Route::post('add-landing', [LandingController::class, 'store']);
            Route::get('edit-landing/{id}', [LandingController::class, 'edit']);
            Route::put('update-landing/{id}', [LandingController::class, 'update']);


            Route::get('faq', [FaqController::class, 'index'])->name('faq');

            Route::get('/faq/create', [FaqController::class, 'create']);
            //Store FAQ
            Route::post('/add-faq', [FaqController::class, 'store']);
            //Edit FAQ
            Route::get('faq/{id}/edit', [FaqController::class, 'edit'])->name('editfaq');
            //Update FAQ
            Route::put('/update/{id}', [FaqController::class, 'update']);
            //Delete FAQ
            Route::delete('faq/{faq}', [FaqController::class, 'destroy']);
            //Status changed Deactive or Active
            Route::get('change-status/{id}', [FaqController::class, 'changeStatus'])->name('change');

            //Show app infos edit
            Route::get('/appinformations', [InformationController::class, 'index'])->name('ShowAppInfos');

            //Edit app Infos
            Route::put('/appinformations/{id}/edit', [InformationController::class, 'update']);

            Route::get('/calendar',[WorkshopController::class,'calendar'])->name('calendar');
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
            Route::get('/dashboard', [ChartController::class, 'index'])->name('dashboard');
            //Show insert workshop page
            Route::get('/workshops/manage/insert', [WorkshopController::class, 'create'])->name('showInsert');

            //Insert workshop
            Route::post('/workshops/manage', [WorkshopController::class, 'store'])->name('storeWorkshop');

            //Show workshops page
            Route::get('/workshops/manage', [WorkshopController::class, 'showWorkshopManage'])->name('showManageWorkshops');

            //Show update workshop
            Route::get('workshops/manage/{id}/{participants}/edit', [WorkshopController::class, 'edit']);

            //Update a workshop
            Route::put('workshops/manage/{id}', [WorkshopController::class, 'update']);

            //Start a workshop
            Route::put('workshops/manage/{id}/startworkshop', [WorkshopController::class, 'startWorkshop']);
            
             //End a workshop
            Route::put('workshops/manage/{id}/endworkshop', [WorkshopController::class, 'endWorkshop']);

            //Delete a workshop
            Route::delete('/workshops/manage/{workshop}', [WorkshopController::class, 'destroy']);
            Route::delete('/forcedelete/{id}', [WorkshopController::class, 'forceDelete']);

            //Restore a workshop
            Route::post('/workshops/manage/{id}/restore', [WorkshopController::class, 'restore'])->name('workshop.restore');

            //Show workshop participants
            Route::get('/workshops/manage/participants/{workshopid}', [WorkshopController::class, 'showParticipants'])->name('showParticipants');


            //Approve participant
            Route::put('/participants/{workshopid}/{participantID}/edit', [WorkshopController::class, 'approveParticipant'])->name('approveParticipant');

            //Decline workshop Participant
            Route::put('/participants/{workshopid}/{participantID}', [WorkshopController::class, 'declineParticipant'])->name('declineParticipant');


            //Delete workshop Participant
            Route::delete('/participants/{workshopid}/{participantID}', [WorkshopController::class, 'deleteParticipant'])->name('deleteParticipant');

            Route::get('/streaminglive/{id}',[StreamingController::class, 'show']);
            Route::get('/streaminglive/insert/{id}',[StreamingController::class, 'insert']);
            Route::post('/add-streaming', [StreamingController::class, 'store']);
            Route::get('/streaminglive/edit/{id}',[StreamingController::class, 'edit']);
            Route::put('/update-streaming/{id}',[StreamingController::class,'update'])->name('updateStreaming');
            Route::delete('/streaming/delete/{id}', [StreamingController::class, 'destroy']);

            Route::post('/comment-add',[CommentController::class,'store']);
            Route::delete('/comment/delete/{comment}',[CommentController::class,'destroy']);
            Route::post('/reply-add',[ReplyController::class,'store']);
            Route::delete('/reply/delete/{id}',[ReplyController::class,'destroy']);

            
            Route::get('/pdf/{workshopid}', [WorkshopController::class,  'showPDF'])->name('showPDF');
                    
            Route::get('/workshops/manage/addparticipant/{workshopid}',[WorkshopUsersController::class,'showUser'])->name('showUser');

            Route::post('/participants/add',[WorkshopUsersController::class,'store'])->name('storeParticipant');

            Route::get('news', [NewsPageController::class, 'newspage'])->name('shownewspages');
            Route::get('/news/add-news', [NewsPageController::class, 'create']);
            Route::post('/add-news', [NewsPageController::class, 'store']);
            Route::get('/news/edit-news/{id}', [NewsPageController::class, 'edit']);
            Route::put('/update-news/{id}', [NewsPageController::class, 'update']);
            Route::delete('/news/delete-news/{id}', [NewsPageController::class, 'destroy']);
        }
    );
    //Users group routes
    Route::group(
        [
            'as' => 'user.',
        ],
        function () {
            // Add routes here for users
            Route::get('users', [Controller::class, 'index'])->name('users'); //this is a test route
        }
    );
});
