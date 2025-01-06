<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class StoreCheckin extends Component
{
    public string $companyUuuid;

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

    public function mount(string $company)
    {
        $this->companyUuuid = $company;
    }

    public function createVisitor(Request $request, Company $company)
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
        // return redirect()->back()->with(['message' => $visit->visitor . ' has been checked in.']);
    }

    public function render()
    {
        return view('livewire.store-checkin');
    }
}
