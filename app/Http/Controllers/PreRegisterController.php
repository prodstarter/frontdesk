<?php

namespace App\Http\Controllers;

use App\Mail\SendPreRegisterInfo;
use App\Models\Category;
use App\Models\Company;
use App\Models\PreRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PreRegisterController extends Controller
{
    public function view($company_uuid)
    {
        $company = Company::where('uuid', $company_uuid);

        if (empty($company_uuid) || !$company->exists()) {
            abort(403, 'Invalid company id');
        }

        $default_categories = [
            'guests' => 'Guests',
            'staff' => 'Staff',
            'clients' => 'Clients',
            'vendors' => 'Vendors',
            'interviewees' => 'Interviewees',
            'prospectiveClients' => 'Prospective Clients',
            'deliveryPersonnel' => 'Delivery Personnel',
            'students' => 'Students',
            'contractEmployees' => 'Contract Employees',
            'consultants' => 'Consultants',
            'vip' => 'VIP',
            'others' => 'Others',
        ];

        $main_categories = Category::where('company_id', $company->first()->id)->get()->pluck('name', 'name')->toArray();
        $main_categories = array_change_key_case($main_categories, CASE_LOWER);


        return view('filament.pre-register')->with([
            'company' => $company->first(),
            'categories' =>  empty($main_categories) ? $default_categories : $main_categories,
        ]);
    }


    public function store(Request $request, Company $company)
    {
        $data = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email|max:255',
            'phone_number'  => 'required|min:10|max:20',
            'gender'        => 'required',
            'category'      => 'required|string|max:255',
            'address'       => 'nullable|string|max:1000',
            'visit_date'    => 'required|date|after_or_equal:today',
            'entry_time'    => 'required|date_format:H:i',
            'exit_time'     => 'required|date_format:H:i|after:entry_time',
            'notes'          => 'nullable|string|max:2000'
        ]);

        $userData = PreRegistration::create(array_merge($data, ['company_id' => $company->id]));

        $qrcode = QrCode::size(200)->generate($userData->email);

        Mail::to($userData->email)->send(
            new SendPreRegisterInfo(
                qrcode: $qrcode,
                userData: $userData,
                company: $company,
            )
        );

        return redirect()->back()->with(['message' => 'You are successfully pregesitered for ' . $company->name]);
    }

    public function checkIn(Company $company)
    {
        return view('filament.check-in')->with(['company' => $company]);
    }
}
