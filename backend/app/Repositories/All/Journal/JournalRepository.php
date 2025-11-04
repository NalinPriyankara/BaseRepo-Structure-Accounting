<?php

namespace App\Repositories\All\Journal;

use App\Models\Journal;
use App\Repositories\Base\BaseRepository;

class JournalRepository extends BaseRepository implements JournalInterface
{
    public function __construct(Journal $model)
    {
        parent::__construct($model);
    }
}
