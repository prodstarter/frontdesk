<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;

class AdminDashboardAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('web')->check()) {

            Auth::guard('web')->logout();

            $panel = Filament::getCurrentPanel();

            if($panel->getId() == 'app'){
                return $next($request);
            }

            return redirect()->route('filament.app.auth.login')->with('error', 'Sorry, you are forbidden to access this page');
        }

        $user = auth()->user();

        if(!$user->admin()){
            return redirect()->route('filament.app.pages.dashboard');
        }

       return $next($request);

    }
   
}
