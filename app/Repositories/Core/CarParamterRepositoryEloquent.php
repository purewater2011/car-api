<?php

namespace App\Repositories\Core;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CarParamterRepository;
use App\Repositories\Models\CarParamter;

/**
 * Class CarParamterRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CarParamterRepositoryEloquent extends BaseRepository implements CarParamterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CarParamter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
