<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetup extends Model
{
    use HasFactory;

    protected $table = 'company_setup';

    protected $fillable = [
        'name',
        'address',
        'domicile',
        'phone_number',
        'fax_number',
        'email_address',
        'bcc_address',
        'official_company_number',
        'GSTNo',
        'home_currency_id',
        'new_company_logo',
        'delete_company_logo',
        'timezone_on_reports',
        'company_logo_on_reports',
        'use_barcodes_on_stocks',
        'auto_increase_of_document_references',
        'use_dimensions_on_recurrent_invoices',
        'use_long_descriptions_on_invoices',
        'company_logo_on_views',
        'fiscal_year_id',
        'tax_periods',
        'tax_last_period',
        'put_alternative_tax_include_on_docs',
        'suppress_tax_rates_on_docs',
        'automatic_revaluation_currency_accounts',
        'base_auto_price_calculation',
        'add_price_from_std_cost',
        'round_calculated_prices_to_nearest_cents',
        'manufacturing_enabled',
        'fixed_assets_enabled',
        'use_dimensions',
        'short_name_and_name_in_list',
        'open_print_dialog_direct_on_reports',
        'search_item_list',
        'search_customer_list',
        'search_supplier_list',
        'login_timeout_seconds',
        'max_day_range_in_documents_days',
    ];

    protected $casts = [
        'delete_company_logo' => 'boolean',
        'timezone_on_reports' => 'boolean',
        'company_logo_on_reports' => 'boolean',
        'use_barcodes_on_stocks' => 'boolean',
        'auto_increase_of_document_references' => 'boolean',
        'use_dimensions_on_recurrent_invoices' => 'boolean',
        'use_long_descriptions_on_invoices' => 'boolean',
        'company_logo_on_views' => 'boolean',
        'put_alternative_tax_include_on_docs' => 'boolean',
        'suppress_tax_rates_on_docs' => 'boolean',
        'automatic_revaluation_currency_accounts' => 'boolean',
        'manufacturing_enabled' => 'boolean',
        'fixed_assets_enabled' => 'boolean',
        'short_name_and_name_in_list' => 'boolean',
        'open_print_dialog_direct_on_reports' => 'boolean',
        'search_item_list' => 'boolean',
        'search_customer_list' => 'boolean',
        'search_supplier_list' => 'boolean',
    ];

    public function homeCurrency() 
    {
        return $this->belongsTo(Currency::class, 'home_currency_id');
    }

    public function fiscalYear() 
    {
        return $this->belongsTo(FiscalYear::class, 'fiscal_year_id');
    }

    public function basePriceCalculation() 
    {
        return $this->belongsTo(SalesType::class, 'base_auto_price_calculation');
    }
}
