<?php

namespace App\Http\Controllers;

use App\Models\PreRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function login(Request $request)
    {
        $success = 1;
        $failure = 0;

        if (! $request->data) return $failure;

        $preUser = PreRegistration::where('email', $request->data)->first();

        if (! $preUser) return $failure;

        $user = User::firstOrCreate(
            ['email' => $preUser->email,],
            [
                'name' => "{$preUser->first_name} {$preUser->last_name}",
                'password' => str()->random(),
                'current_company_id' => $preUser->company_id,
            ]
        );

        Auth::login($user);
        return $success;
    }
}
