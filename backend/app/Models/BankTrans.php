<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTrans extends Model
{
    use HasFactory;

    protected $table = 'bank_trans';

    protected $fillable = [
        'bank_act',
        'trans_no',
        'type',
        'ref',
        'trans_date',
        'amount',
        'dimension_id',
        'dimension2_id',
        'person_type_id',
        'person_id',
        'reconciled',
    ];

    // Relationship: belongs to BankAccount
    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_act');
    }

    // Relationship: belongs to DebtorTrans (composite key)
    public function debtorTrans()
    {
        return $this->belongsTo(DebtorTrans::class, 'trans_no', 'trans_no')
            ->where('trans_type', $this->type);
    }
}
