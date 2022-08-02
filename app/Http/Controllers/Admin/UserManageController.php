<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
    //This is a test controller, in the future it can be deleted
    public function index(){

        return view('manageUsers');
    }



    public function test(){

        $this->authorize('test_create',User::class);

        return view('manageUsers');
    }
}
