<?php

namespace App\Repositories\All\Bom;

use App\Models\Bom;
use App\Repositories\Base\BaseRepository;

class BomRepository extends BaseRepository implements BomInterface
{
    public function __construct(Bom $model)
    {
        parent::__construct($model);
    }
}
