<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Professor extends Model
{
    protected $fillable = [
        'admin_id',
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function interns(): HasMany
    {
        return $this->hasMany(Intern::class);
    }
}
