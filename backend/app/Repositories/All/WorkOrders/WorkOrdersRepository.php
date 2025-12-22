<?php

namespace App\Repositories\All\WorkOrders;

use App\Models\WorkOrder;
use App\Repositories\Base\BaseRepository;

class WorkOrdersRepository extends BaseRepository implements WorkOrdersInterface
{
    public function __construct(WorkOrder $model)
    {
        parent::__construct($model);
    }
}
