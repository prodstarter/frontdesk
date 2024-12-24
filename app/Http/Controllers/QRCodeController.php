<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\PreRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function create(Company $company)
    {
        return view('qrcode.create')->with(['company' => $company]);
    }

    public function store(Request $request)
    {
        $success = 1;
        $failure = 0;

        if (! $request->data) return $failure;

        $preUser = PreRegistration::where('email', $request->data)->first();

        if (! $preUser) return $failure;

        return [$success, $preUser];
    }
}
