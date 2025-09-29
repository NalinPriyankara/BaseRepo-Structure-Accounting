<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPricing extends Model
{
    use HasFactory;

    protected $table = 'sales_pricing';

    protected $fillable = [
        'currency_id',
        'sales_type_id',
        'price',
    ];

    // Relationships
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function salesType()
    {
        return $this->belongsTo(SalesType::class);
    }
}
