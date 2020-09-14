<?php

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

Broadcast::channel('logdo', function () {
    Log::info('Mwaka');
});

// Broadcast::channel('logdo.{id}', function ($user, $id) {
    
//     Log::info('Mwaka');

//     $log = Log::find($id);
//     if(!$log){
//         return false;
//     }
//     return $user->id == $log->app->user_id;
// });
