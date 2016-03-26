<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $table = 'core_roles';

    protected $fillable = [];

}
