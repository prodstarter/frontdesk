<?php

namespace App\Livewire;

use App\Mail\SendPreRegisterInfo;
use App\Models\Company;
use App\Models\PreRegistration;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PreRegister extends Component
{
    public Company $company;

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

    public function mount($uuid)
    {
        dd($uuid);
    }


    protected function rules()
    {
        return [
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
            'notes'         => 'nullable|string|max:2000',
        ];
    }

    public function submit()
    {
        $this->validate();

        $userData = PreRegistration::create(array_merge($this->validate(), ['company_id' => $this->company->id]));

        $qrcode = QrCode::size(200)->generate($userData->email);

        Mail::to($userData->email)->send(
            new SendPreRegisterInfo(
                qrcode: $qrcode,
                userData: $userData,
                company: $this->company,
            )
        );

        session()->flash('message', 'You are successfully pre-registered for ' . $this->company->name);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pre-register');
    }
}
