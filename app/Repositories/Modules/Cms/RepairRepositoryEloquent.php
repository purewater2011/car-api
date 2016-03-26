<?php

namespace App\Repositories\Modules\Cms;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\RepairRepository;
use App\Repositories\Models\Repair;

/**
 * Class RepairRepositoryEloquent
 * @package namespace App\Repositories\Modules\Cms;
 */
class RepairRepositoryEloquent extends BaseRepository implements RepairRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Repair::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
