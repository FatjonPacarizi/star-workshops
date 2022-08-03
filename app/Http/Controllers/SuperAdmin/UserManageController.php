<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
     public function index(){
       
        return view('manageUsers',['users'=>User::all()]);
    }

    //Show edit form
    public function edit($id){
        return view('editUser',['user'=>User::find($id)]);
    }

      //update user
      public function update($id){

          request()->validate([
              'name' => 'required',
              'email' => 'required|email',
              'user_status' => 'required',
          ]);
  
          $user = User::find($id);
          $user->update([
              'name' => request('name'),
              'email' => request('email'),
              'user_status' => request('user_status'),
          ]);
  
          return redirect('/usersManager');
      }
   
      // delete contact
      public function destroy(User $user){
        
        $user->delete();
        
        return redirect('/usersManager');
      }
}
