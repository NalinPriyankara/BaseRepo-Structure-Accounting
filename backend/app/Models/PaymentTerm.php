<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model
{
    use HasFactory;

    protected $table = 'payment_terms';
    protected $primaryKey = 'terms_indicator';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'description',
        'days_before_due',
        'day_in_following_month',
        'inactive',
    ];

    protected $casts = [
        'inactive' => 'boolean',
    ];
}
