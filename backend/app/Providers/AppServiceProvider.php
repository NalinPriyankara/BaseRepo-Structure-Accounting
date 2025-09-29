<?php

namespace App\Providers;

use App\Repositories\All\AccountTag\AccountTagInterface;
use App\Repositories\All\AccountTag\AccountTagRepository;
use App\Repositories\All\Auth\AuthInterface;
use App\Repositories\All\Auth\AuthRepository;
use App\Repositories\All\CreditStatusSetup\CreditStatusSetupInterface;
use App\Repositories\All\CreditStatusSetup\CreditStatusSetupRepository;
use App\Repositories\All\Currency\CurrencyInterface;
use App\Repositories\All\Currency\CurrencyRepository;
use App\Repositories\All\Customer\CustomerInterface;
use App\Repositories\All\Customer\CustomerRepository;
use App\Repositories\All\ExchangeRate\ExchangeRateInterface;
use App\Repositories\All\ExchangeRate\ExchangeRateRepository;
use App\Repositories\All\FiscalYear\FiscalYearInterface;
use App\Repositories\All\FiscalYear\FiscalYearRepository;
use App\Repositories\All\ItemTaxType\ItemTaxTypeInterface;
use App\Repositories\All\ItemTaxType\ItemTaxTypeRepository;
use App\Repositories\All\ItemUnit\ItemUnitInterface;
use App\Repositories\All\ItemUnit\ItemUnitRepository;
use App\Repositories\All\SalesArea\SalesAreaInterface;
use App\Repositories\All\SalesArea\SalesAreaRepository;
use App\Repositories\All\SalesGroup\SalesGroupInterface;
use App\Repositories\All\SalesGroup\SalesGroupRepository;
use App\Repositories\All\SalesPerson\SalesPersonInterface;
use App\Repositories\All\SalesPerson\SalesPersonRepository;
use App\Repositories\All\SalesType\SalesTypeInterface;
use App\Repositories\All\SalesType\SalesTypeRepository;
use App\Repositories\All\Supplier\SupplierInterface;
use App\Repositories\All\Supplier\SupplierRepository;
use App\Repositories\All\TaxGroup\TaxGroupInterface;
use App\Repositories\All\TaxGroup\TaxGroupRepository;
use App\Repositories\All\TaxType\TaxTypeInterface;
use App\Repositories\All\TaxType\TaxTypeRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\All\UserManagement\UserManagementInterface;
use App\Repositories\All\UserManagement\UserManagementRepository;
use App\Repositories\All\WorkCentre\WorkCentreInterface;
use App\Repositories\All\WorkCentre\WorkCentreRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserManagementInterface::class, UserManagementRepository::class);
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(CurrencyInterface::class, CurrencyRepository::class);
        $this->app->bind(FiscalYearInterface::class, FiscalYearRepository::class);
        $this->app->bind(TaxTypeInterface::class, TaxTypeRepository::class);
        $this->app->bind(TaxGroupInterface::class, TaxGroupRepository::class);
        $this->app->bind(SalesGroupInterface::class, SalesGroupRepository::class);
        $this->app->bind(SalesAreaInterface::class, SalesAreaRepository::class);
        $this->app->bind(SalesTypeInterface::class, SalesTypeRepository::class);
        $this->app->bind(AccountTagInterface::class, AccountTagRepository::class);
        $this->app->bind(ExchangeRateInterface::class, ExchangeRateRepository::class);
        $this->app->bind(CustomerInterface::class, CustomerRepository::class);
        $this->app->bind(SupplierInterface::class, SupplierRepository::class);
        $this->app->bind(SalesPersonInterface::class, SalesPersonRepository::class);
        $this->app->bind(ItemTaxTypeInterface::class, ItemTaxTypeRepository::class);
        $this->app->bind(WorkCentreInterface::class, WorkCentreRepository::class);
        $this->app->bind(CreditStatusSetupInterface::class, CreditStatusSetupRepository::class);
        $this->app->bind(ItemUnitInterface::class, ItemUnitRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
