<?php

namespace App\Repositories\Core;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CarBrandRepository;
use App\Repositories\Models\CarBrand;

/**
 * Class CarBrandRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CarBrandRepositoryEloquent extends BaseRepository implements CarBrandRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CarBrand::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
