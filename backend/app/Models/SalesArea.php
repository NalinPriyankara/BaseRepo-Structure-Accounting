<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesArea extends Model
{
    use HasFactory;

    protected $table = 'sales_areas';

    protected $fillable = [
        'name'
    ];
}
