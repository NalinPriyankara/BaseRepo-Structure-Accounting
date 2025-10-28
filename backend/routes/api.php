<?php

use App\Http\Controllers\AccountTagController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\ChartClassController;
use App\Http\Controllers\ChartMasterController;
use App\Http\Controllers\ChartTypeController;
use App\Http\Controllers\ClassTypeController;
use App\Http\Controllers\CompanySetupController;
use App\Http\Controllers\CreditStatusSetupController;
use App\Http\Controllers\CrmCategoryController;
use App\Http\Controllers\CrmContactsController;
use App\Http\Controllers\CrmPersonsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerBranchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DebtorsMasterController;
use App\Http\Controllers\DimensionTagController;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\FixedAssetsLocationController;
use App\Http\Controllers\InventoryLocationController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemTaxTypeController;
use App\Http\Controllers\ItemUnitController;
use App\Http\Controllers\PaymentTermController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\RevaluateCurrencyController;
use App\Http\Controllers\SalesAreaController;
use App\Http\Controllers\SalesGroupController;
use App\Http\Controllers\SalesPersonController;
use App\Http\Controllers\SalesPricingController;
use App\Http\Controllers\SalesTypeController;
use App\Http\Controllers\SecurityRolesController;
use App\Http\Controllers\ShippingCompnayController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TaxGroupController;
use App\Http\Controllers\TaxGroupItemController;
use App\Http\Controllers\TaxTypeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WorkCentreController;
use App\Http\Controllers\ItemTaxTypeExceptionController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\StockFaClassController;
use App\Http\Controllers\StockMasterController;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    $user = $request->user();

    if (!$user) {
        return response()->json(null, 204);
    }

    // fetch role row from security_roles by role name (the user_profiles.role column)
    $roleRow = DB::table('security_roles')->where('role', $user->role)->first();

    $sections = [];
    $areas = [];

    if ($roleRow) {
        if (!empty($roleRow->sections)) {
            $sections = array_values(array_filter(explode(';', $roleRow->sections)));
        }
        if (!empty($roleRow->areas)) {
            $areas = array_values(array_filter(explode(';', $roleRow->areas)));
        }
    }

    return response()->json([
        'id' => $user->id ?? null,
        'email' => $user->email ?? null,
        'telephone' => $user->telephone ?? null,
        'role' => $user->role ?? null,
        'role_id' => $roleRow->id ?? null,
        'sections' => $sections,
        'areas' => $areas,
        'status' => $user->status ?? null,
        'first_name' => $user->first_name ?? ($user->firstName ?? null),
        'last_name' => $user->last_name ?? ($user->lastName ?? null),
    ]);
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::resource("user-managements", UserManagementController::class);
Route::resource("currencies", CurrencyController::class);
Route::resource("fiscal-years", FiscalYearController::class);
Route::apiResource('tax-types', TaxTypeController::class);
Route::apiResource('tax-groups', TaxGroupController::class);
Route::delete('tax-group-items/{tax_group_id}/{tax_type_id}', [TaxGroupItemController::class, 'destroy']);
Route::apiResource('tax-group-items', TaxGroupItemController::class)->except(['destroy']);
Route::put('tax-group-items/{taxGroupId}/{taxTypeId}', [TaxGroupItemController::class, 'update']);


Route::resource("sales-groups", SalesGroupController::class);
Route::resource("sales-areas", SalesAreaController::class);
Route::resource("sales-types", SalesTypeController::class);
Route::resource("sales-persons", SalesPersonController::class);

Route::apiResource('account-tags', AccountTagController::class);
Route::apiResource('exchange-rates', ExchangeRateController::class);

Route::apiResource("customers", CustomerController::class);
Route::apiResource("suppliers", SupplierController::class);

Route::apiResource("item-tax-types", ItemTaxTypeController::class);
Route::delete('item-tax-type-exceptions/{item_id}/{tax_type_id}',[ItemTaxTypeExceptionController::class, 'destroy']);
Route::apiResource("item-tax-type-exceptions", ItemTaxTypeExceptionController::class);

Route::apiResource("work-centres", WorkCentreController::class);
Route::apiResource("credit-status-setup", CreditStatusSetupController::class);
Route::apiResource("item-units", ItemUnitController::class);

Route::apiResource('dimension-tags', DimensionTagController::class);
Route::apiResource('fixed-assets-locations', FixedAssetsLocationController::class);
Route::apiResource('sales-pricings', SalesPricingController::class);

Route::apiResource('inventory-locations', InventoryLocationController::class);
Route::apiResource("company-setup", CompanySetupController::class);

Route::apiResource('shipping-companies', ShippingCompnayController::class);
Route::apiResource('payment-terms', PaymentTermController::class);
Route::apiResource('payment-types', PaymentTypeController::class);

Route::apiResource('debtors-master', DebtorsMasterController::class);
Route::apiResource('crm-persons', CrmPersonsController::class);
Route::apiResource('customer-branch', CustomerBranchController::class);
Route::apiResource('crm-categories', CrmCategoryController::class);

Route::apiResource('chart-classes', ChartClassController::class);
Route::apiResource('chart-types', ChartTypeController::class);
Route::apiResource('chart-masters', ChartMasterController::class);
Route::apiResource('class-types', ClassTypeController::class);
Route::apiResource('account-types', AccountTypeController::class);
Route::apiResource('bank-accounts', BankAccountController::class);

Route::apiResource('user-profiles', UserProfileController::class);

Route::apiResource('revaluate-currencies', RevaluateCurrencyController::class);
Route::apiResource('crm-contacts', CrmContactsController::class);

Route::apiResource('security-roles', SecurityRolesController::class);

Route::apiResource('item-categories', ItemCategoryController::class);
Route::apiResource('item-types', ItemTypeController::class);

Route::apiResource('stock-fa-classes', StockFaClassController::class);
Route::apiResource('stock-masters', StockMasterController::class);

