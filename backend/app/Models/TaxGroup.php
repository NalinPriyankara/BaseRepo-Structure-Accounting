<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'tax',
        'shipping_tax',
    ];

    public function branches()
    {
        return $this->hasMany(CustomerBranch::class, 'tax_group', 'id');
    }
}