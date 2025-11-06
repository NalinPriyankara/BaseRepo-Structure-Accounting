<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    public $incrementing = false;
    public $timestamps = true;
    protected $primaryKey = null;
    protected $keyType = 'int';

    protected $fillable = [
        'type',
        'id',
        'date_',
        'memo_',
    ];
}
