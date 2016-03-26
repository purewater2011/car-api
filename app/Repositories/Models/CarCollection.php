<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CarCollection extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $table = 'cms_car_collection';

    protected $fillable = [];

}
