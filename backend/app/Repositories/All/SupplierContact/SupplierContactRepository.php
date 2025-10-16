<?php

namespace App\Repositories\All\SupplierContact;

use App\Models\SupplierContact;
use App\Repositories\Base\BaseRepository;

class SupplierContactRepository extends BaseRepository implements SupplierContactInterface
{
    public function __construct(SupplierContact $model)
    {
        parent::__construct($model);
    }
}
