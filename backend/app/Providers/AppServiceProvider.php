<?php

namespace App\Providers;

use App\Models\TaxGroupItem;
use App\Models\UserProfile;
use App\Repositories\All\AccountTag\AccountTagInterface;
use App\Repositories\All\AccountTag\AccountTagRepository;
use App\Repositories\All\AccountType\AccountTypeInterface;
use App\Repositories\All\AccountType\AccountTypeRepository;
use App\Repositories\All\AuditTrail\AuditTrailInterface;
use App\Repositories\All\AuditTrail\AuditTrailRepository;
use App\Repositories\All\Auth\AuthInterface;
use App\Repositories\All\Auth\AuthRepository;
use App\Repositories\All\BankAccount\BankAccountInterface;
use App\Repositories\All\BankAccount\BankAccountRepository as BankAccountBankAccountRepository;
use App\Repositories\All\ChartClass\ChartClassInterface;
use App\Repositories\All\ChartClass\ChartClassRepository;
use App\Repositories\All\ChartMaster\ChartMasterInterface;
use App\Repositories\All\ChartMaster\ChartMasterRepository;
use App\Repositories\All\ChartType\ChartTypeInterface;
use App\Repositories\All\ChartType\ChartTypeRepository;
use App\Repositories\All\ClassType\ClassTypeInterface;
use App\Repositories\All\ClassType\ClassTypeRepository;
use App\Repositories\All\Comments\CommentsInterface;
use App\Repositories\All\Comments\CommentsRepository;
use App\Repositories\All\CompanySetup\CompanySetupInterface;
use App\Repositories\All\CompanySetup\CompanySetupRepository;
use App\Repositories\All\CreditStatusSetup\CreditStatusSetupInterface;
use App\Repositories\All\CreditStatusSetup\CreditStatusSetupRepository;
use App\Repositories\All\CrmCategory\CrmCategoryInterface;
use App\Repositories\All\CrmCategory\CrmCategoryRepository;
use App\Repositories\All\CrmContacts\CrmContactsInterface;
use App\Repositories\All\CrmContacts\CrmContactsRepository;
use App\Repositories\All\CrmPersons\CrmPersonsInterface;
use App\Repositories\All\CrmPersons\CrmPersonsRepository;
use App\Repositories\All\Currency\CurrencyInterface;
use App\Repositories\All\Currency\CurrencyRepository;
use App\Repositories\All\Customer\CustomerInterface;
use App\Repositories\All\Customer\CustomerRepository;
use App\Repositories\All\CustomerBranch\CustomerBranchInterface;
use App\Repositories\All\CustomerBranch\CustomerBranchRepository;
use App\Repositories\All\DebtorsMaster\DebtorsMasterInterface;
use App\Repositories\All\DebtorsMaster\DebtorsMasterRepository;
use App\Repositories\All\DebtorTrans\DebtorTransInterface;
use App\Repositories\All\DebtorTrans\DebtorTransRepository;
use App\Repositories\All\DimensionTag\DimensionTagInterface;
use App\Repositories\All\DimensionTag\DimensionTagRepository;
use App\Repositories\All\EntryType\EntryTypeInterface;
use App\Repositories\All\EntryType\EntryTypeRepository;
use App\Repositories\All\ExchangeRate\ExchangeRateInterface;
use App\Repositories\All\ExchangeRate\ExchangeRateRepository;
use App\Repositories\All\FiscalYear\FiscalYearInterface;
use App\Repositories\All\FiscalYear\FiscalYearRepository;
use App\Repositories\All\FixedAssetsLocation\FixedAssetsLocationInterface;
use App\Repositories\All\FixedAssetsLocation\FixedAssetsLocationRepository;
use App\Repositories\All\InventoryLocation\InventoryLocationInterface;
use App\Repositories\All\InventoryLocation\InventoryLocationRepository;
use App\Repositories\All\ItemCategory\ItemCategoryInterface;
use App\Repositories\All\ItemCategory\ItemCategoryRepository;
use App\Repositories\All\ItemCodes\ItemCodesInterface;
use App\Repositories\All\ItemCodes\ItemCodesRepository;
use App\Repositories\All\ItemTaxType\ItemTaxTypeInterface;
use App\Repositories\All\ItemTaxType\ItemTaxTypeRepository;
use App\Repositories\All\ItemTaxTypeException\ItemTaxTypeExceptionInterface;
use App\Repositories\All\ItemTaxTypeException\ItemTaxTypeExceptionRepository;
use App\Repositories\All\ItemType\ItemTypeInterface;
use App\Repositories\All\ItemType\ItemTypeRepository;
use App\Repositories\All\ItemUnit\ItemUnitInterface;
use App\Repositories\All\ItemUnit\ItemUnitRepository;
use App\Repositories\All\Journal\JournalInterface;
use App\Repositories\All\Journal\JournalRepository;
use App\Repositories\All\LocStock\LocStockInterface;
use App\Repositories\All\LocStock\LocStockRepository;
use App\Repositories\All\PaymentTerm\PaymentTermInterface;
use App\Repositories\All\PaymentTerm\PaymentTermRepository;
use App\Repositories\All\PaymentType\PaymentTypeInterface;
use App\Repositories\All\PaymentType\PaymentTypeRepository;
use App\Repositories\All\PurchasingPricing\PurchasingPricingInterface;
use App\Repositories\All\PurchasingPricing\PurchasingPricingRepository;
use App\Repositories\All\Reflines\ReflinesInterface;
use App\Repositories\All\Reflines\ReflinesRepository;
use App\Repositories\All\Refs\RefsInterface;
use App\Repositories\All\Refs\RefsRepository;
use App\Repositories\All\RevaluateCurrency\RevaluateCurrencyInterface;
use App\Repositories\All\RevaluateCurrency\RevaluateCurrencyRepository;
use App\Repositories\All\SalesArea\SalesAreaInterface;
use App\Repositories\All\SalesArea\SalesAreaRepository;
use App\Repositories\All\SalesGroup\SalesGroupInterface;
use App\Repositories\All\SalesGroup\SalesGroupRepository;
use App\Repositories\All\SalesOrderDetails\SalesOrderDetailsInterface;
use App\Repositories\All\SalesOrderDetails\SalesOrderDetailsRepository;
use App\Repositories\All\SalesOrders\SalesOrdersInterface;
use App\Repositories\All\SalesOrders\SalesOrdersRepository;
use App\Repositories\All\SalesPerson\SalesPersonInterface;
use App\Repositories\All\SalesPerson\SalesPersonRepository;
use App\Repositories\All\SalesPricing\SalesPricingInterface;
use App\Repositories\All\SalesPricing\SalesPricingRepository;
use App\Repositories\All\SalesType\SalesTypeInterface;
use App\Repositories\All\SalesType\SalesTypeRepository;
use App\Repositories\All\SecurityRoles\SecurityRolesInterface;
use App\Repositories\All\SecurityRoles\SecurityRolesRepository;
use App\Repositories\All\ShippingCompany\ShippingCompanyInterface;
use App\Repositories\All\ShippingCompany\ShippingCompanyRepository;
use App\Repositories\All\StockFaClass\StockFaClassInterface;
use App\Repositories\All\StockFaClass\StockFaClassRepository;
use App\Repositories\All\StockMaster\StockMasterInterface;
use App\Repositories\All\StockMaster\StockMasterRepository;
use App\Repositories\All\StockMoves\StockMovesInterface;
use App\Repositories\All\StockMoves\StockMovesRepository;
use App\Repositories\All\Supplier\SupplierInterface;
use App\Repositories\All\Supplier\SupplierRepository;
use App\Repositories\All\TaxGroup\TaxGroupInterface;
use App\Repositories\All\TaxGroup\TaxGroupRepository;
use App\Repositories\All\TaxGroupItem\TaxGroupItemInterface;
use App\Repositories\All\TaxGroupItem\TaxGroupItemRepository;
use App\Repositories\All\TaxType\TaxTypeInterface;
use App\Repositories\All\TaxType\TaxTypeRepository;
use App\Repositories\All\TransTypes\TransTypesInterface;
use App\Repositories\All\TransTypes\TransTypesRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\All\UserManagement\UserManagementInterface;
use App\Repositories\All\UserManagement\UserManagementRepository;
use App\Repositories\All\WorkCentre\WorkCentreInterface;
use App\Repositories\All\WorkCentre\WorkCentreRepository;
use App\Repositories\All\UserProfile\UserProfileInterface;
use App\Repositories\All\UserProfile\UserProfileRepository;

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
        $this->app->bind(DimensionTagInterface::class, DimensionTagRepository::class);
        $this->app->bind(FixedAssetsLocationInterface::class, FixedAssetsLocationRepository::class);
        $this->app->bind(SalesPricingInterface::class, SalesPricingRepository::class);
        $this->app->bind(ItemTaxTypeInterface::class, ItemTaxTypeRepository::class);
        $this->app->bind(WorkCentreInterface::class, WorkCentreRepository::class);
        $this->app->bind(CreditStatusSetupInterface::class, CreditStatusSetupRepository::class);
        $this->app->bind(ItemUnitInterface::class, ItemUnitRepository::class);
        $this->app->bind(CompanySetupInterface::class, CompanySetupRepository::class);
        $this->app->bind(InventoryLocationInterface::class, InventoryLocationRepository::class);
        $this->app->bind(ShippingCompanyInterface::class, ShippingCompanyRepository::class);
        $this->app->bind(PaymentTermInterface::class, PaymentTermRepository::class);
        $this->app->bind(DebtorsMasterInterface::class, DebtorsMasterRepository::class);
        $this->app->bind(CrmPersonsInterface::class, CrmPersonsRepository::class);
        $this->app->bind(CustomerBranchInterface::class, CustomerBranchRepository::class);
        $this->app->bind(CrmCategoryInterface::class, CrmCategoryRepository::class);
        $this->app->bind(ChartClassInterface::class, ChartClassRepository::class);
        $this->app->bind(ChartTypeInterface::class, ChartTypeRepository::class);
        $this->app->bind(ChartMasterInterface::class, ChartMasterRepository::class);
        $this->app->bind(ClassTypeInterface::class, ClassTypeRepository::class);
        $this->app->bind(AccountTypeInterface::class, AccountTypeRepository::class);
        $this->app->bind(BankAccountInterface::class, BankAccountBankAccountRepository::class);
        $this->app->bind(UserProfileInterface::class, UserProfileRepository::class);
        $this->app->bind(PaymentTypeInterface::class, PaymentTypeRepository::class);
        $this->app->bind(RevaluateCurrencyInterface::class, RevaluateCurrencyRepository::class);
        $this->app->bind(CrmContactsInterface::class, CrmContactsRepository::class);
        $this->app->bind(TaxGroupItemInterface::class, TaxGroupItemRepository::class);
        $this->app->bind(ItemTaxTypeExceptionInterface::class, ItemTaxTypeExceptionRepository::class);
        $this->app->bind(SecurityRolesInterface::class, SecurityRolesRepository::class);
        $this->app->bind(ItemCategoryInterface::class, ItemCategoryRepository::class);
        $this->app->bind(ItemTypeInterface::class, ItemTypeRepository::class);
        $this->app->bind(StockFaClassInterface::class, StockFaClassRepository::class);
        $this->app->bind(StockMasterInterface::class, StockMasterRepository::class);
        $this->app->bind(PurchasingPricingInterface::class, PurchasingPricingRepository::class);
        $this->app->bind(LocStockInterface::class, LocStockRepository::class);
        $this->app->bind(ItemCodesInterface::class, ItemCodesRepository::class);
        $this->app->bind(JournalInterface::class, JournalRepository::class);
        $this->app->bind(RefsInterface::class, RefsRepository::class);
        $this->app->bind(AuditTrailInterface::class, AuditTrailRepository::class);
        $this->app->bind(StockMovesInterface::class, StockMovesRepository::class);
        $this->app->bind(CommentsInterface::class, CommentsRepository::class);
        $this->app->bind(ReflinesInterface::class, ReflinesRepository::class);
        $this->app->bind(TransTypesInterface::class, TransTypesRepository::class);
        $this->app->bind(SalesOrdersInterface::class, SalesOrdersRepository::class);
        $this->app->bind(SalesOrderDetailsInterface::class, SalesOrderDetailsRepository::class);
        $this->app->bind(DebtorTransInterface::class, DebtorTransRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $router = $this->app->make(\Illuminate\Routing\Router::class);

        if (method_exists($router, 'aliasMiddleware')) {
            $router->aliasMiddleware('permission', \App\Http\Middleware\CheckPermission::class);
        } else {
            $router->middleware('permission', \App\Http\Middleware\CheckPermission::class);
        }
    }
}
