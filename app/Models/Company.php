<?php

namespace App\Models;

use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Wallo\FilamentCompanies\Company as FilamentCompaniesCompany;
use Wallo\FilamentCompanies\Events\CompanyCreated;
use Wallo\FilamentCompanies\Events\CompanyDeleted;
use Wallo\FilamentCompanies\Events\CompanyUpdated;

class Company extends FilamentCompaniesCompany implements HasAvatar
{
    use HasFactory;

    protected $casts = [
        'personal_company' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'personal_company',
    ];

    protected $dispatchesEvents = [
        'created' => CompanyCreated::class,
        'updated' => CompanyUpdated::class,
        'deleted' => CompanyDeleted::class,
    ];

    public function getFilamentAvatarUrl(): string
    {
        return $this->owner->profile_photo_url;
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function companyInvitations(): HasMany
    {
        return $this->hasMany(CompanyInvitation::class);
    }

    public function userInvitations(): HasMany
    {
        return $this->hasMany(UserInvitation::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function designations(): HasMany
    {
        return $this->hasMany(Designation::class);
    }

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }

    public function preRegistrations(): HasMany
    {
        return $this->hasMany(PreRegistration::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = str()->uuid();
        });
    }
}
