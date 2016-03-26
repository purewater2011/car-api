<?php

namespace App\Repositories\Modules\Crm;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ShopViewRepository;
use App\Repositories\Models\ShopView;

/**
 * Class ShopViewRepositoryEloquent
 * @package namespace App\Repositories\Modules\Crm;
 */
class ShopViewRepositoryEloquent extends BaseRepository implements ShopViewRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ShopView::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
