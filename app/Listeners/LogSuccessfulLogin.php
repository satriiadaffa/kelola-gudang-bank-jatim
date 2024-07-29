<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        $user = Auth::user();
        $user->last_session_id = session()->getId();
        $user->last_login_at = now();
        $user->last_login_ip = request()->ip();
        $user->save();
    }
}
