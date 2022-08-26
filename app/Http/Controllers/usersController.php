<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function getUsersByStaffPosition(){
        
        $user = User::paginate(8);
        
    }
}
