<?php

namespace App\Repositories\All\Supplier;

use App\Models\Supplier;
use App\Repositories\Base\BaseRepository;

class SupplierRepository extends BaseRepository implements SupplierInterface
{
    public function __construct(Supplier $model)
    {
        parent::__construct($model);
    }
}
