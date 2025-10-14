<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartMaster extends Model
{
    use HasFactory;

    protected $table = 'chart_master';
    protected $primaryKey = 'account_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['account_code', 'account_code2', 'account_name', 'account_type', 'inactive'];

    public function chartType()
    {
        return $this->belongsTo(ChartType::class, 'account_type', 'id');
    }

    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class, 'account_gl_code', 'account_code');
    }

    public function bankChargeAccounts()
    {
        return $this->hasMany(BankAccount::class, 'bank_charges_act', 'account_code');
    }
}
