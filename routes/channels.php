<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\OpenOrder;

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

Broadcast::channel('user-balance-info{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('order-{transactionId}', function ($user, $transactionId) {
    return true;
});

Broadcast::channel('limit-{transactionId}', function ($user, $transactionId) {
    return true;
});

Broadcast::channel('running-order-{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('earning-{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
