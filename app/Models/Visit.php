<?php

namespace App\Models;

use App\Traits\UuidScopeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use HasFactory;
    use UuidScopeTrait;
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = [
        'arrival',
        'departure',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
