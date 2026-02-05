<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCircular extends Model
{
    protected $fillable = [
        'title',
        'description',
        'requirements',
        'location',
        'job_type',
        'salary_min',
        'salary_max',
        'application_deadline',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'application_deadline' => 'date',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
    ];
}
