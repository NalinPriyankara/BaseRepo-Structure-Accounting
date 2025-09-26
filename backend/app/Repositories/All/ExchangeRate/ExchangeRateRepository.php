<?php

namespace App\Repositories\All\ExchangeRate;

use App\Models\ExchangeRate;
use App\Repositories\Base\BaseRepository;

class ExchangeRateRepository extends BaseRepository implements ExchangeRateInterface
{
    public function __construct(ExchangeRate $model)
    {
        parent::__construct($model);
    }

    // You can add custom methods for ExchangeRate here if required
}
