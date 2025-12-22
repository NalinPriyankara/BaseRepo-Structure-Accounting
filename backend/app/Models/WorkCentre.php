<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkCentre extends Model
{
    use HasFactory;

    protected $table = 'work_centres';
    
    protected $fillable = [
        'name',
        'description',
        'inactive',
    ];

    public function boms()
    {
        return $this->hasMany(Bom::class, 'work_centre');
    }
}
