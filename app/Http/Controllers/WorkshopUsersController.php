<?php

namespace App\Http\Controllers;

use App\Models\Workshop_Users;
use App\Models\workshops_users;
use App\Http\Requests\StoreWorkshop_UsersRequest;
use App\Http\Requests\UpdateWorkshop_UsersRequest;
use App\Models\Workshop;
use App\Models\User;

class WorkshopUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkshop_UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkshop_UsersRequest $request)
    {

        $validated = [
            'workshop_id'=>$request->input('workshop_id'),
            'user_id'=>$request->input('user_id'),
            'application_status' => 'approved',
            
         ];
        workshops_users::create($validated);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workshop_Users  $workshop_Users
     * @return \Illuminate\Http\Response
     */
    public function show(Workshop_Users $workshop_Users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workshop_Users  $workshop_Users
     * @return \Illuminate\Http\Response
     */
    public function edit(Workshop_Users $workshop_Users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkshop_UsersRequest  $request
     * @param  \App\Models\Workshop_Users  $workshop_Users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkshop_UsersRequest $request, Workshop_Users $workshop_Users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workshop_Users  $workshop_Users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshop_Users $workshop_Users)
    {
        //
    }

    
    public function showUser($workshopid){
        $workshops = Workshop::find($workshopid);
        $users = User::all();
        return view('workshopsParticipantAdd',['users'=> $users,'workshops'=>$workshops]);
    }
}
