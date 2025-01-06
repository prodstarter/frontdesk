<?php

namespace App\Livewire;

use App\Models\PreRegistration;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class CreateQRLogin extends Component
{
    public string $companyUuid;

    protected $rules = [
        'data'    => 'required',
    ];

    public function mount($company)
    {
        $this->companyUuid = $company;
    }

    public function store()
    {

        $validatedData = $this->validate();

        $success = 1;
        $failure = 0;

        if (!$validatedData['data']) return $failure;

        $preUser = PreRegistration::where('email', $validatedData['data'])->first();

        if (! $preUser) return $failure;

        return [$success, $preUser];
    }

    public function render()
    {
        return view('livewire.create-q-r-login');
    }
}
