<?php

namespace App\Repositories\All\SalesPricing;

use App\Repositories\Base\EloquentRepositoryInterface;

interface SalesPricingInterface extends EloquentRepositoryInterface
{
    // Add custom methods if needed later
    public function allWithRelations();
}
