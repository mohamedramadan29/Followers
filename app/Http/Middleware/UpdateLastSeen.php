<?php

namespace App\Http\Middleware;

use App\Models\front\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UpdateLastSeen
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
           // dd('user checked');
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $user->last_seen = Carbon::now();
            $user->save();
        }

        return $next($request);
    }
}
