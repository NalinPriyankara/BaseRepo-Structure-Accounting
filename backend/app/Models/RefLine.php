<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefLine extends Model
{
    use HasFactory;

    protected $table = 'reflines';

    protected $fillable = [
        'trans_type',
        'prefix',
        'pattern',
        'description',
        'default',
        'inactive',
    ];

    protected $casts = [
        'default' => 'boolean',
        'inactive' => 'boolean',
    ];
}
