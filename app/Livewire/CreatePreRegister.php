<?php

namespace App\Livewire;

use App\Mail\CheckInVisitor;
use App\Mail\SendPreRegisterInfo;
use App\Models\Category;
use App\Models\Company;
use App\Models\PreRegistration;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;

class CreatePreRegister extends Component
{
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

    public $main_categories;
    public $companyUuid;
    public $company;

    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $gender;
    public $category;
    public $address;
    public $visit_date;
    public $entry_time;
    public $exit_time;
    public $notes;

    protected $rules = [
        'first_name'    => 'required|string|max:255',
        'last_name'     => 'required|string|max:255',
        'email'         => 'required|email|unique:pre_registrations,email|max:255',
        'phone_number'  => 'required|min:10|max:20',
        'gender'        => 'required',
        'category'      => 'required|string|max:255',
        'address'       => 'nullable|string|max:1000',
        'visit_date'    => 'required|date|after_or_equal:today',
        'entry_time'    => 'required|date_format:H:i',
        'exit_time'     => 'required|date_format:H:i|after:entry_time',
        'notes'          => 'nullable|string|max:2000'
    ];

    public function mount($company)
    {
        $this->companyUuid = $company;
        $this->company = Company::where('uuid', $this->companyUuid)->firstOrFail();

        $this->main_categories = Category::where('company_id', $this->company->id)->get()->pluck('name', 'name')->toArray();
        $this->main_categories = array_change_key_case($this->main_categories, CASE_LOWER);
    }

    public function store()
    {
        $validatedData = $this->validate();

        $userData = PreRegistration::create(array_merge($validatedData, ['company_id' => $this->company->id]));

        $qrcode = QrCode::size(200)->generate($userData->email);

        Mail::to($userData->email)->send(
            new SendPreRegisterInfo(
                qrcode: $qrcode,
                userData: $userData,
                company: $this->company,
            )
        );



        Mail::to((env('MAIL_FROM_ADDRESS')))->send(
            new CheckInVisitor(
                userData: $userData,
                company: $this->company,
            )
        );

        $this->reset([
            'first_name',
            'last_name',
            'email',
            'phone_number',
            'gender',
            'category',
            'address',
            'visit_date',
            'entry_time',
            'exit_time',
            'notes',
        ]);

        request()->session()->flash('message', 'You are successfully pre-registered ' . $userData->first_name . ' for ' . $this->company->name);
    }

    public function render()
    {
        return view('livewire.create-pre-register', [
            'company' => $this->company,
            'categories' => empty($this->main_categories) ? $this->default_categories : $this->main_categories,
        ]);
    }
}
