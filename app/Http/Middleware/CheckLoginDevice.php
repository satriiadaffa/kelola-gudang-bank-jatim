<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckLoginDevice
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            $session_id = session()->getId();

            if ($user->last_session_id && $user->last_session_id !== $session_id) {
                Auth::logout();
                return redirect('/login')->withErrors(['msg' => 'You have been logged out because your account was logged in from another device.']);
            }

            $user->last_session_id = $session_id;
            $user->last_login_at = now();
            $user->last_login_ip = $request->ip();
            $user->save();
        }

        return $next($request);
    }
}
