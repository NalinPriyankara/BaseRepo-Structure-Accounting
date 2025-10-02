<?php

namespace App\Repositories\All\PaymentTerm;

use App\Models\PaymentTerm;
use App\Repositories\Base\BaseRepository;

class PaymentTermRepository extends BaseRepository implements PaymentTermInterface
{
    public function __construct(PaymentTerm $model)
    {
        parent::__construct($model);
    }
}
