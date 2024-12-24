<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Employee;
use App\Models\PreRegistration;
use App\Models\Visit;
use Carbon\Carbon;
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

    public function create(Company $company, $preUserId)
    {
        $main_categories = Category::where('company_id', $company->id)->get()->pluck('name', 'name')->toArray();
        $main_categories = array_change_key_case($main_categories, CASE_LOWER);
        $employess = Employee::where('company_id', $company->id)->get();

        $preUser = PreRegistration::find($preUserId);

        return view('check-in.create')->with([
            'company' => $company,
            'categories' =>  empty($main_categories) ? $this->default_categories : $main_categories,
            'preUser' => $preUser,
            'employees' => $employess,
        ]);
    }

    public function store(Request $request, Company $company)
    {

        $data = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'visitor_email'  => 'required|email|max:255',
            'visitor_phone'  => 'required|min:10|max:20',
            'arrival'    => 'required',
            'departure'     => 'required|after:arrival',
            'purpose'          => 'nullable|string|max:2000',
            'employee_id' => 'required',
        ]);

        $visit = Visit::create([
            'company_id' => $company->id,
            'uuid' => str()->uuid(),

            'visitor_email' => $data['visitor_email'],
            'visitor_phone' => $data['visitor_phone'],
            'purpose' => $data['purpose'],
            'arrival' => Carbon::createFromFormat('H:i', $data['arrival'])->toDateTimeString(),
            'departure' => Carbon::createFromFormat('H:i', $data['departure'])->toDateTimeString(),
            'employee_id' =>  $data['employee_id'],
            'visitor' => "{$data['last_name']} {$data['first_name']}"
        ]);

        return redirect()->back()->with(['message' => $visit->visitor . ' has been checked in.']);
    }
}
