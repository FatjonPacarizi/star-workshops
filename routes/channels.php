<?php

use App\Models\User;
use App\Models\Workshop;
use App\Models\workshops_users;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('workshop.{id}', function ($user, $id) {
    if ($user->user_status == "superadmin") return true;

    else if ($user->user_status == "admin") return  Workshop::find($id)->author === $user->id;
    
    else {
        $approved = User::find($user->id)->workshops()->wherePivot('workshop_id', $id)->wherePivot('application_status', 'approved')->first();

        if ($approved != null) return true;
    }
    
    return false;
});
