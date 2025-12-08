<?php

namespace App\Repositories\All\SysPrefs;

use App\Models\SysPrefs;
use App\Repositories\Base\BaseRepository;

class SysPrefsRepository extends BaseRepository implements SysPrefsInterface
{
    public function __construct(SysPrefs $model)
    {
        parent::__construct($model);
    }
}
