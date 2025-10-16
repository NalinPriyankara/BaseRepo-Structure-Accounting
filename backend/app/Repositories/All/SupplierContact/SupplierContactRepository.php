<?php

namespace App\Repositories\All\SupplierContact;

use App\Models\SupplierContact;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class SupplierContactRepository extends BaseRepository implements SupplierContactInterface
{
    public function __construct(SupplierContact $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model->with([
            'supplier'
        ])->get();
    }
}