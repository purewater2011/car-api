<?php

namespace App\Repositories\Modules\Crm;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CarViewRepository;
use App\Repositories\Models\CarView;

/**
 * Class CarViewRepositoryEloquent
 * @package namespace App\Repositories\Modules\Crm;
 */
class CarViewRepositoryEloquent extends BaseRepository implements CarViewRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CarView::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
