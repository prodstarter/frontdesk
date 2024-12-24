<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\PreRegistration;
use App\Models\Visit;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public $default_categories = [
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

    public function create(Company $company, PreRegistration $preUser)
    {
        $main_categories = Category::where('company_id', $company->first()->id)->get()->pluck('name', 'name')->toArray();
        $main_categories = array_change_key_case($main_categories, CASE_LOWER);

        return view('check-in.create')->with([
            'company' => $company,
            'categories' =>  empty($main_categories) ? $this->default_categories : $main_categories,
            'preUser' => $preUser,
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
            'address'       => 'required|string|max:1000',
            'visit_date'    => 'required|date|after_or_equal:today',
            'entry_time'    => 'required|date_format:H:i',
            'exit_time'     => 'required|date_format:H:i|after:entry_time',
            'notes'          => 'nullable|string|max:2000'
        ]);

        // Visit::create(array_merge($data, [
        //     'company_id' => '',
        //     'uuid' => '',
        // ]));

        return redirect()->back();
    }
}
