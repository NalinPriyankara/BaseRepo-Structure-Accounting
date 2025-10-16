<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
{
    use HasFactory;

    protected $table = 'supplier_contacts';

    protected $fillable = [
        'supplier_id',
        'short_name',
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

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }
}
