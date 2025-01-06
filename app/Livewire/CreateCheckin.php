<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Company;
use App\Models\Employee;
use App\Models\PreRegistration;
use App\Models\Visit;
use Carbon\Carbon;
use Livewire\Component;

class CreateCheckin extends Component
{
    public string $companyId;
    public int $preregistrationId;
    public $preUser;
    public $employees;
    public $company;
    public $main_categories;
    public array $default_categories = [
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

    public $first_name;
    public $last_name;
    public $visitor_email;
    public $visitor_phone;
    public $arrival;
    public $departure;
    public $purpose;
    public $employee_id;

    protected $rules = [
        'first_name'    => 'required|string|max:255',
        'last_name'     => 'required|string|max:255',
        'visitor_email'  => 'required|email|max:255',
        'visitor_phone'  => 'required|min:10|max:20',
        'arrival'    => 'required',
        'departure'     => 'required|after:arrival',
        'purpose'          => 'nullable|string|max:2000',
        'employee_id' => 'required',
    ];


    public function mount(string $company, int $preregistration)
    {
        $this->companyId = $company;
        $this->preregistrationId = $preregistration;

        if (empty($this->preregistrationId) || ! PreRegistration::whereId($this->preregistrationId)->exists()) {
            abort(403, 'Invalid preuser id');
        }

        $this->main_categories = Category::where('company_id', $this->companyId)->get()->pluck('name', 'name')->toArray();
        $this->main_categories = array_change_key_case($this->main_categories, CASE_LOWER);
        $this->company = Company::where('uuid', $this->companyId)->first();
        $this->employees = Employee::where('company_id', $this->company->id)->get();
        $this->preUser = PreRegistration::find($this->preregistrationId);


        $this->arrival = $this->preUser->entry_time;
        $this->departure = $this->preUser->exit_time;
    }


    public function createVisitor(Company $company)
    {
        $validatedData = $this->validate();

        $visit = Visit::create([
            'company_id' => $company->id,
            'uuid' => str()->uuid(),
            'visitor_email' => $validatedData['visitor_email'],
            'visitor_phone' => $validatedData['visitor_phone'],
            'purpose' => $validatedData['purpose'],
            'arrival' => Carbon::createFromFormat('H:i:s', $validatedData['arrival'])->toDateTimeString(),
            'departure' => Carbon::createFromFormat('H:i:s', $validatedData['departure'])->toDateTimeString(),
            'employee_id' =>  $validatedData['employee_id'],
            'visitor' => "{$validatedData['last_name']} {$validatedData['first_name']}"
        ]);

        $this->reset([
            'first_name',
            'last_name',
            'visitor_email',
            'visitor_phone',
            'arrival',
            'departure',
            'purpose',
            'employee_id',
        ]);

        session()->flash('message', $visit->visitor . ' has been checked in.');
    }

    public function render()
    {
        return view('livewire.create-checkin', [
            'company' => 100,
            'categories' =>  empty($this->main_categories) ? $this->default_categories : $this->main_categories,
            'preUser' => $this->preUser,
            'employees' => $this->employees,
        ]);
    }
}
