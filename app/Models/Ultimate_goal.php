<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ultimate_goal extends Model
{
    use SoftDeletes;
    protected $table='ultimate_goal';
}


