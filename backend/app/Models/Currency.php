<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

     use HasFactory;

    protected $table = 'currencies';

    protected $fillable = [
        'currency_abbreviation',
        'currency_symbol',
        'currency_name',
        'hundredths_name',
        'country',
        'auto_exchange_rate_update',
    ];


    protected $casts = [
        'auto_exchange_rate_update' => 'boolean',
    ];

    public function salesPricing()
    {
        return $this->hasMany(SalesPricing::class);
    }

    public function companySetup()
    {
        return $this->hasMany(CompanySetup::class, 'home_currency_id');
    }

    public function debtors()
    {
        return $this->hasMany(DebtorsMaster::class, 'curr_code', 'currency_abbreviation');
    }

}