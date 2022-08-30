<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Positions;
use App\Models\positions_users;
use App\Models\User;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
     public function index(){
       
        return view('manageUsers',['users'=>User::paginate(8)]);
    }

    //Show edit form
    public function edit($id){

        $userPosition = User::Join("positions_users", function($join){
            $join->on("users.id", "=", "positions_users.user_id");
        })
        ->Join("positions", function($join){
            $join->on("positions_users.position_id", "=", "positions.id");
        })
        ->where('positions_users.user_id',$id)
        ->select("positions.position as position")
        ->get();
     
        return view('editUser',['user'=>User::find($id),'positions'=>Positions::all(),'userPosition'=>$userPosition[0]]);
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
              'description' => request('description'),
              'facebook' => ('facebook'),
              'instagram' => ('instagram'),
              'github' => ('github'),
          ]);

         positions_users::where('user_id',$user->id)->update([
            'position_id' => request('position_id'),
         ]);
       
  
          return redirect('/usersManager');
      }
   
      // delete contact
      public function destroy(User $user){
        
        $user->delete();
        
        return redirect('/usersManager');
      }
}
