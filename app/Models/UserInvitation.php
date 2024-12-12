<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInvitation extends Model
{
    protected $table = 'user_invitations';

    protected $fillable = [
        'email',
        'company_id',
        'code',
    ];


    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
