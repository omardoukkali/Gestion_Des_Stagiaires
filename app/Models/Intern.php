<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Intern extends Model
{
    protected $fillable = [
        'professor_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'start_date',
        'end_date',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function professor(): BelongsTo
    {
        return $this->belongsTo(Professor::class);
    }
}
