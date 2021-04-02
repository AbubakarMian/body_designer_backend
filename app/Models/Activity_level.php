<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Activity_level extends Model
{
    use SoftDeletes;
    protected $table='activity_level';
}
