<?php

namespace App\Repositories\Modules\Cms;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ShopCommentRepository;
use App\Repositories\Models\ShopComment;

/**
 * Class ShopCommentRepositoryEloquent
 * @package namespace App\Repositories\Modules\Cms;
 */
class ShopCommentRepositoryEloquent extends BaseRepository implements ShopCommentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ShopComment::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
