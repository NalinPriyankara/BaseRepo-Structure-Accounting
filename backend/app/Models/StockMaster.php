<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMaster extends Model
{
    use HasFactory;

    protected $table = 'stock_master';
    protected $primaryKey = 'stock_id';
    public $incrementing = false; // because stock_id is a string, not auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'stock_id',
        'category_id',
        'tax_type_id',
        'description',
        'long_description',
        'units',
        'mb_flag',
        'sales_account',
        'cogs_account',
        'inventory_account',
        'adjustment_account',
        'wip_account',
        'dimension_id',
        'dimension2_id',
        'purchase_cost',
        'material_cost',
        'labour_cost',
        'overhead_cost',
        'inactive',
        'no_sale',
        'no_purchase',
        'editable',
        'depreciation_method',
        'depreciation_rate',
        'depreciation_factor',
        'depreciation_start',
        'depreciation_date',
        'fa_class_id',
    ];

    // Each stock belongs to a category
    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id', 'category_id');
    }

    // Each stock belongs to a tax type
    public function taxType()
    {
        return $this->belongsTo(ItemTaxTypes::class, 'tax_type_id', 'id');
    }

    // Each stock belongs to an item type
    public function itemType()
    {
        return $this->belongsTo(ItemType::class, 'mb_flag', 'id');
    }

    // Each stock belongs to an item unit
    public function unit()
    {
        return $this->belongsTo(ItemUnit::class, 'units', 'id');
    }

    // Each stock belongs to a fixed asset class
    public function faClass()
    {
        return $this->belongsTo(StockFaClass::class, 'fa_class_id', 'fa_class_id');
    }

    // Chart master account relations
    public function salesAccount()
    {
        return $this->belongsTo(ChartMaster::class, 'sales_account', 'account_code');
    }

    public function cogsAccount()
    {
        return $this->belongsTo(ChartMaster::class, 'cogs_account', 'account_code');
    }

    public function inventoryAccount()
    {
        return $this->belongsTo(ChartMaster::class, 'inventory_account', 'account_code');
    }

    public function adjustmentAccount()
    {
        return $this->belongsTo(ChartMaster::class, 'adjustment_account', 'account_code');
    }

    public function wipAccount()
    {
        return $this->belongsTo(ChartMaster::class, 'wip_account', 'account_code');
    }

    public function itemCodes()
    {
        return $this->hasMany(ItemCode::class, 'stock_id', 'stock_id');
    }

}
