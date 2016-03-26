<?php

namespace App\Repositories\Core;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CarTypeRepository;
use App\Repositories\Models\CarType;

/**
 * Class CarTypeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CarTypeRepositoryEloquent extends BaseRepository implements CarTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CarType::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
