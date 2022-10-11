<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Positions;
use App\Models\positions_users;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewNotification;
use Session;

class UserManageController extends Controller
{
    public function index()
    {
        return view('manageUsers');
    }

    public function edit($id)
    {
        return view('editUser', ['user' => User::find($id)]);
    }

    public function update($id)
    {
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

        positions_users::where('user_id', $user->id)->update([
            'position_id' => request('position_id'),
        ]);


        return redirect('/users/manage');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users/manage');
    }

    public function showNotificaton()
    {
        $notifications = auth()->user()->unreadNotifications;
        return view('notifications');
    }

    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
