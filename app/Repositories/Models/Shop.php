<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Shop extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $table = 'cms_shop';

    protected $fillable = [];

    public function album(){
        return $this->belongsToMany(Album::class, 'cms_shop_album', 'sid', 'aid');
    }
}
