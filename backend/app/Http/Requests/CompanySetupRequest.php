<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanySetupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'domicile' => 'required|string|max:255',
            'phone_number' => 'required|string|max:50',
            'fax_number' => 'nullable|string|max:50',
            'email_address' => 'required|email|max:255',
            'bcc_address' => 'nullable|email|max:255',
            'official_company_number' => 'required|string|max:100',
            'GSTNo' => 'required|string|max:50',
            'home_currency_id' => 'required|exists:currencies,id',
            'fiscal_year_id' => 'required|exists:fiscal_years,id',
            'base_auto_price_calculation' => 'nullable|exists:sales_types,id',
            'new_company_logo' => 'nullable|string|max:255',
            'delete_company_logo' => 'boolean',
            'timezone_on_reports' => 'boolean',
            'company_logo_on_reports' => 'boolean',
            'use_barcodes_on_stocks' => 'boolean',
            'auto_increase_of_document_references' => 'boolean',
            'use_dimensions_on_recurrent_invoices' => 'boolean',
            'use_long_descriptions_on_invoices' => 'boolean',
            'company_logo_on_views' => 'boolean',
            'tax_periods' => 'nullable|integer',
            'tax_last_period' => 'integer',
            'put_alternative_tax_include_on_docs' => 'boolean',
            'suppress_tax_rates_on_docs' => 'boolean',
            'automatic_revaluation_currency_accounts' => 'boolean',
            'add_price_from_std_cost' => 'numeric',
            'round_calculated_prices_to_nearest_cents' => 'integer',
            'manufacturing_enabled' => 'boolean',
            'fixed_assets_enabled' => 'boolean',
            'use_dimensions' => 'integer',
            'short_name_and_name_in_list' => 'boolean',
            'open_print_dialog_direct_on_reports' => 'boolean',
            'search_item_list' => 'boolean',
            'search_customer_list' => 'boolean',
            'search_supplier_list' => 'boolean',
            'login_timeout_seconds' => 'integer',
            'max_day_range_in_documents_days' => 'integer',
        ];
    }
}
