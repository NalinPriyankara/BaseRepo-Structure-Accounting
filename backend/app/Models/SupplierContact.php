<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
{
    use HasFactory;

    protected $table = 'supplier_contacts';

    protected $fillable = [
        'ref',
        'name',
        'name2',
        'address',
        'phone',
        'phone2',
        'fax',
        'email',
        'lang',
        'notes',
        'inactive',
    ];

    protected $casts = [
        'inactive' => 'boolean',
    ];
}
