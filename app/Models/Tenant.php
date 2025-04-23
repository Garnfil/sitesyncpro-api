<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'domain',
        'database',
        'is_active',
    ];

    protected $casts = [
        'database' => 'array',
        'is_active' => 'boolean',
    ];
}
