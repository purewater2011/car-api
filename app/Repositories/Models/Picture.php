<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Picture extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $table = 'core_picture';
    protected $fillable = [];

    public function album(){
        return $this->belongsTo(Album::class);
    }
}
