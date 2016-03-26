<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Album extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $table = 'core_album';
    protected $fillable = [];

    public function car(){
        return $this->belongsToMany(Car::class, 'cms_car_album', 'cid', 'aid');
    }
}
