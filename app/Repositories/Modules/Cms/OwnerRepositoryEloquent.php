<?php

namespace App\Repositories\Modules\Cms;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\OwnerRepository;
use App\Repositories\Models\Owner;

/**
 * Class OwnerRepositoryEloquent
 * @package namespace App\Repositories\Modules\Cms;
 */
class OwnerRepositoryEloquent extends BaseRepository implements OwnerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Owner::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
