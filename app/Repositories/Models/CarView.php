<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CarView extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $table = 'crm_car_view';

    protected $fillable = [];

}
