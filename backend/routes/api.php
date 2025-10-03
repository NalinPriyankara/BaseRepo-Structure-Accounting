<?php

use App\Http\Controllers\AccountTagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartClassController;
use App\Http\Controllers\ChartMasterController;
use App\Http\Controllers\ChartTypeController;
use App\Http\Controllers\CompanySetupController;
use App\Http\Controllers\CreditStatusSetupController;
use App\Http\Controllers\CrmPersonsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DebtorsMasterController;
use App\Http\Controllers\DimensionTagController;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\FixedAssetsLocationController;
use App\Http\Controllers\InventoryLocationController;
use App\Http\Controllers\ItemTaxTypeController;
use App\Http\Controllers\ItemUnitController;
use App\Http\Controllers\PaymentTermController;
use App\Http\Controllers\SalesAreaController;
use App\Http\Controllers\SalesGroupController;
use App\Http\Controllers\SalesPersonController;
use App\Http\Controllers\SalesPricingController;
use App\Http\Controllers\SalesTypeController;
use App\Http\Controllers\ShippingCompnayController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TaxGroupController;
use App\Http\Controllers\TaxTypeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\WorkCentreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::resource("user-managements", UserManagementController::class);
Route::resource("currencies", CurrencyController::class);
Route::resource("fiscal-years", FiscalYearController::class);
Route::apiResource('tax-types', TaxTypeController::class);
Route::apiResource('tax-groups', TaxGroupController::class);

Route::resource("sales-groups", SalesGroupController::class);
Route::resource("sales-areas", SalesAreaController::class);
Route::resource("sales-types", SalesTypeController::class);
Route::resource("sales-persons", SalesPersonController::class);

Route::apiResource('account-tags', AccountTagController::class);
Route::apiResource('exchange-rates', ExchangeRateController::class);

Route::apiResource("customers", CustomerController::class);
Route::apiResource("suppliers", SupplierController::class);

Route::apiResource("item-tax-types", ItemTaxTypeController::class);
Route::apiResource("work-centres", WorkCentreController::class);
Route::apiResource("credit-status-setup", CreditStatusSetupController::class);
Route::apiResource("item-units", ItemUnitController::class);

Route::apiResource('dimension-tags', DimensionTagController::class);
Route::apiResource('fixed-assets-locations', FixedAssetsLocationController::class);
Route::apiResource('sales-pricings', SalesPricingController::class);

Route::apiResource('chart-classes', ChartClassController::class);
Route::apiResource('chart-types', ChartTypeController::class);
Route::apiResource('chart-masters', ChartMasterController::class);

Route::apiResource('inventory-locations', InventoryLocationController::class);
Route::apiResource("company-setup", CompanySetupController::class);

Route::apiResource('shipping-companies', ShippingCompnayController::class);
Route::apiResource('payment-terms', PaymentTermController::class);

Route::apiResource('debtors-master', DebtorsMasterController::class);
Route::apiResource('crm-persons', CrmPersonsController::class);