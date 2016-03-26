<?php

namespace App\Repositories\Modules\Cms;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ShopCollectionRepository;
use App\Repositories\Models\ShopCollection;

/**
 * Class ShopCollectionRepositoryEloquent
 * @package namespace App\Repositories\Modules\Cms;
 */
class ShopCollectionRepositoryEloquent extends BaseRepository implements ShopCollectionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ShopCollection::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
