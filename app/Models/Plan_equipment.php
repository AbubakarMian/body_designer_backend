<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Plan_equipment extends Model
{
    use SoftDeletes;
    protected $table='plan_equipment';
}


