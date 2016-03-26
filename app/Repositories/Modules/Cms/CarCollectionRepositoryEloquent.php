<?php

namespace App\Repositories\Modules\Cms;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CarCollectionRepository;
use App\Repositories\Models\CarCollection;

/**
 * Class CarCollectionRepositoryEloquent
 * @package namespace App\Repositories\Modules\Cms;
 */
class CarCollectionRepositoryEloquent extends BaseRepository implements CarCollectionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CarCollection::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
