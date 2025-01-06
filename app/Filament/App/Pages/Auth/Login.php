<?php

namespace App\Filament\App\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    protected static string $view = 'filament.app.pages.auth.login';

    public function mount(): void
    {
        parent::mount();

        $this->form->fill([
            'email' => 'admin@frontdesk.test',
            'password' => '12345678',
            'remember' => true,
        ]);
    }
}
