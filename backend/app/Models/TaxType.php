<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxType extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'default_rate',
        'sales_gl_account',
        'purchasing_gl_account',
    ];
}
