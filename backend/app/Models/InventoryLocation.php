<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLocation extends Model
{
    use HasFactory;

    // Table name (optional if Laravel can guess it)
    protected $table = 'inventory_locations';

    // Primary key (by default it's "id", so no need to redefine)
    protected $primaryKey = 'id';

    // Fillable fields (for mass assignment)
    protected $fillable = [
        'loc_code',
        'location_name',
        'delivery_address',
        'phone',
        'phone2',
        'fax',
        'email',
        'contact',
    ];
}
