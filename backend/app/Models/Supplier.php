<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [
        'supplier_name',
        'supplier_short_name',
        'gst_number',
        'website',
        'supplier_currency',
        'tax_group',
        'our_customer_no',
        'bank_account',
        'bank_name',
        'credit_limit',
        'payment_terms',
        'prices_include_tax',
        'accounts_payable',
        'purchase_account',
        'purchase_discount_account',
        'contact_person',
        'phone',
        'secondary_phone',
        'fax',
        'email',
        'document_language',
        'mailing_address',
        'physical_address',
        'general_notes',
    ];
}
