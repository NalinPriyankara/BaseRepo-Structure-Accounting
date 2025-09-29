<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesType extends Model
{
    use HasFactory;

    protected $table = 'sales_types';

    protected $fillable = [
        'typeName',
        'factor',
        'taxIncl',
        'status'
    ];

    protected $casts = [
        'factor' => 'decimal:1',
        'taxIncl' => 'boolean',
    ];

    public function salesPricing()
    {
        return $this->hasMany(SalesPricing::class);
    }

}
