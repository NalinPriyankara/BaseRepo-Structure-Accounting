<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $table = 'workorders';

    protected $fillable = [
        'wo_ref',
        'loc_code',
        'units_reqd',
        'stock_id',
        'date',
        'type',
        'required_by',
        'released_date',
        'units_issued',
        'closed',
        'released',
        'additional_costs',
    ];

    public function location()
    {
        return $this->belongsTo(InventoryLocation::class, 'loc_code', 'loc_code');
    }

    public function stock()
    {
        return $this->belongsTo(StockMaster::class, 'stock_id', 'stock_id');
    }

    public function transactionType()
    {
        return $this->belongsTo(TransType::class, 'type', 'trans_type');
    }

    public function requirements()
    {
        return $this->hasMany(WoRequirement::class, 'workorder_id');
    }

    public function manufactures()
    {
        return $this->hasMany(WOManufacture::class, 'workorder_id');
    }

    public function issues()
    {
        return $this->hasMany(WoIssue::class, 'workorder_id');
    }
}
