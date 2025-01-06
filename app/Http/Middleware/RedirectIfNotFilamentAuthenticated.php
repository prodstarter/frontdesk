<?php

namespace App\Http\Middleware;

use Filament\Facades\Filament;
use Filament\Http\Middleware\Authenticate as Middleware;

class RedirectIfNotFilamentAuthenticated extends Middleware
{
    protected function redirectTo($request): ?string
    {
        return route('filament.app.auth.login');
    }
}
