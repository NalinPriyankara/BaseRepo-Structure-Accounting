<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    protected $table = 'fiscal_years';
    
    protected $fillable = [
        'fiscal_year_from',
        'fiscal_year_to',
    ];
}
