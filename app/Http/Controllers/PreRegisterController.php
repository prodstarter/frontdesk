<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\PreRegistration;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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
            'visit_date'    => 'required|date|after:today',
            'entry_time'    => 'required|date_format:H:i',
            'exit_time'     => 'required|date_format:H:i|after:entry_time',
            'notes'          => 'nullable|string|max:2000'
        ]);

        PreRegistration::create(array_merge($data, ['company_id' => $company->id]));
        return redirect()->back()->with(['message' => 'You are successfully pregesitered for ' . $company->name]);
    }
}
